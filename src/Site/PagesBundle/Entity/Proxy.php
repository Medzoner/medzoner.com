<?php

namespace Site\PagesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proxy
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Proxy {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ch", type="string", length=255)
     */
    private $ch;

    /**
     * @var string
     *
     * @ORM\Column(name="prefix", type="string", length=255)
     */
    private $prefix;

    /**
     * @var array
     *
     * @ORM\Column(name="blockedDomains", type="array")
     */
    private $blockedDomains;

    /**
     * @var string
     *
     * @ORM\Column(name="baseUrl", type="string", length=255)
     */
    private $baseUrl;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set ch
     *
     * @param string $ch
     * @return Proxy
     */
    public function setCh($ch) {
        $this->ch = $ch;

        return $this;
    }

    /**
     * Get ch
     *
     * @return string 
     */
    public function getCh() {
        return $this->ch;
    }

    /**
     * Set prefix
     *
     * @param string $prefix
     * @return Proxy
     */
    public function setPrefix($prefix) {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * Get prefix
     *
     * @return string 
     */
    public function getPrefix() {
        return $this->prefix;
    }

    /**
     * Set blockedDomains
     *
     * @param array $blockedDomains
     * @return Proxy
     */
    public function setBlockedDomains($blockedDomains) {
        $this->blockedDomains = $blockedDomains;

        return $this;
    }

    /**
     * Get blockedDomains
     *
     * @return array 
     */
    public function getBlockedDomains() {
        return $this->blockedDomains;
    }

    /**
     * Set baseUrl
     *
     * @param string $baseUrl
     * @return Proxy
     */
    public function setBaseUrl($baseUrl) {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    /**
     * Get baseUrl
     *
     * @return string 
     */
    public function getBaseUrl() {
        return $this->baseUrl;
    }

    /**
     * 
     */
    public function __construct() {

        $this->prefix = 'http://facebook.com';
        $this->blockedDomains = array('facebook.com');

        $this->ch = curl_init();
        curl_setopt($this->ch, CURLOPT_HEADER, true);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        @curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($this->ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($this->ch, CURLOPT_USERAGENT, 'Opera/9.23 (Windows NT 5.1; U; en)');

        // URL without proxy.php
        $this->baseUrl = substr($_SERVER['PHP_SELF'], 0, -9);
    }

    /**
     * Run
     * @param string $url
     * @param array $get $_GET global var
     * @param array $post $_POST global var
     * @return string Response 
     */
    public function run($url, $get, $post) {
        // Use default

        $url = $this->decodeUrl($url);

        // Apppend get params to request
        if ($get) {
            $url .= '?' . http_build_query($get);
        }

        curl_setopt($this->ch, CURLOPT_URL, $this->prefix . '/' . $url);

        // set optional post params
        if ($post) {
            curl_setopt($this->ch, CURLOPT_POSTFIELDS, $post);
            curl_setopt($this->ch, CURLOPT_POST, true);
        }

        // See below
        $return = $this->curlExecFollow($this->ch);

        // Throw exception on error
        if ($return === false)
            throw new Exception($this->error());

        // Strip redirect headers
        $body = $return;
        while (strpos($body, 'HTTP') === 0) {
            list($header, $body) = explode("\r\n\r\n", $body, 2);
        }

        // Set response headers
        $this->setResponseHeaders($header);

        return str_replace('<html>', '', str_replace('<html>', '', str_replace('<!DOCTYPE html>', '', $body)));
    }

    protected function setResponseHeaders($header) {
        // Headers that should be mapped to client
        $mappedHeaders = array(
            'Set-Cookie',
            'Expires',
            'Last-Modified',
            'Cache-Control',
            'Content-Type',
            'Pragma'
        );

        // Parse headers
        $headers = $this->parseHeaders($header);
        foreach ($headers as $name => $value) {
            // If header isn't mapped, don't set it
            if (!array_search($name, $mappedHeaders))
                continue;

            // Support for multiple values with same name
            if (is_array($value))
                foreach ($value as $part)
                    header($name . ': ' . $part, false);
            else
                header($name . ': ' . $value);
        }
    }

    // Parse headers into array
    protected function parseHeaders($header) {
        $retVal = array();
        $fields = explode("\r\n", preg_replace('/\x0D\x0A[\x09\x20]+/', ' ', $header));
        foreach ($fields as $field) {
            if (preg_match('/([^:]+): (.+)/m', $field, $match)) {
                $match[1] = preg_replace('/(?<=^|[\x09\x20\x2D])./e', 'strtoupper("\0")', strtolower(trim($match[1])));
                if (isset($retVal[$match[1]])) {
                    $retVal[$match[1]] = array($retVal[$match[1]], $match[2]);
                } else {
                    $retVal[$match[1]] = trim($match[2]);
                }
            }
        }
        return $retVal;
    }

    /**
     *
     * @param string $url
     * @return string 
     */
    protected function decodeUrl($url) {
        return str_replace(' ', '%20', $url);
    }

    /**
     * Get error message
     * @return string 
     */
    protected function error() {
        return curl_error($this->ch);
    }

    /**
     * Allow redirects under safe mode
     * @param curl_handle $ch
     * @return string 
     */
    protected function curlExecFollow($ch) {
        $mr = 5;
        if (ini_get('open_basedir') == '' && (ini_get('safe_mode') == 'Off' || ini_get('safe_mode') == '')) {
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $mr > 0);
            curl_setopt($ch, CURLOPT_MAXREDIRS, $mr);
        } else {
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
            if ($mr > 0) {
                $newurl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

                $rch = curl_copy_handle($ch);
                curl_setopt($rch, CURLOPT_HEADER, true);
                curl_setopt($rch, CURLOPT_NOBODY, true);
                curl_setopt($rch, CURLOPT_FORBID_REUSE, false);
                curl_setopt($rch, CURLOPT_RETURNTRANSFER, true);
                do {
                    if (strpos($newurl, '/') === 0)
                        $newurl = $this->prefix . $newurl;

                    curl_setopt($rch, CURLOPT_URL, $newurl);
                    $header = curl_exec($rch);
                    if (curl_errno($rch)) {
                        $code = 0;
                    } else {
                        $code = curl_getinfo($rch, CURLINFO_HTTP_CODE);
                        if ($code == 301 || $code == 302) {
                            preg_match('/Location:(.*?)\n/', $header, $matches);
                            $newurl = str_replace(' ', '%20', trim(array_pop($matches)));
                        } else {
                            $code = 0;
                        }
                    }
                } while ($code && --$mr);
                curl_close($rch);
                if (!$mr) {
                    if ($maxredirect === null) {
                        trigger_error('Too many redirects. When following redirects, libcurl hit the maximum amount.', E_USER_WARNING);
                    } else {
                        $maxredirect = 0;
                    }
                    return false;
                }
                curl_setopt($ch, CURLOPT_URL, $newurl);
            }
        }
        return curl_exec($ch);
    }
}
