<?php

/* SitePagesBundle:Portfolio:index.html.twig */
class __TwigTemplate_843a10a60097bee0f8f2e37430bdb1928ef17623c7b97e523204a6997a9fe164 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("base.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["page_title"] = "Book";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 5
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    ";
        // line 6
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "45d73fb_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_45d73fb_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/45d73fb_slick_1.css");
            // line 11
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
            // asset "45d73fb_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_45d73fb_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/45d73fb_portfolio_2.css");
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
        } else {
            // asset "45d73fb"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_45d73fb") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/45d73fb.css");
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
        }
        unset($context["asset_url"]);
        // line 12
        echo "  
";
    }

    // line 15
    public function block_javascripts($context, array $blocks = array())
    {
        // line 16
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

    ";
        // line 18
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "cabad63_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_cabad63_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/cabad63_slick_1.js");
            // line 23
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "cabad63"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_cabad63") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/cabad63.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 25
        echo "    <script type=\"text/javascript\">
        \$(document).ready(function () {
            \$(window).load(function () {

                \$(\".carousel .item\").each(function () {
                    \$(this).css(
                            {
                                'background': 'url(' + \$(this).children('img').attr('src') + ') no-repeat scroll 0 center / cover rgba(0, 0, 0, 0)'
                            }
                    );
                });

                \$('.carousel').slick({
                    accessibility: true,
                    autoplay: true,
                    autoplaySpeed: 8000,
                    speed: 800,
                    dots: false,
                    arrows: false
                });

            });
        });
    </script>
";
    }

    // line 51
    public function block_content($context, array $blocks = array())
    {
        // line 52
        echo "    <div class=\"book row\">
        <div class=\"large-12 columns\">
            <section class=\"content\">
                <div class=\"row\">
                    <div class=\"small-6 small-centered columns\">
                        <div id=\"portfolio\">
                            <ul class=\"carousel\">
                                ";
        // line 59
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["projects"]) ? $context["projects"] : $this->getContext($context, "projects")));
        foreach ($context['_seq'] as $context["_key"] => $context["project"]) {
            // line 60
            echo "                                    <li class=\"item\">
                                        <a data-reveal-id=\"myModal";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "id", array()), "html", null, true);
            echo "\" class=\"zoompicture imgHolder\" href=\"http://www.ad-mp.com/bundles/admppages/images/home/portfolio/";
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "image", array()), "html", null, true);
            echo "\">
                                            <img style=\"display: inline;\" class=\"lazy previewZoom\" data-original=\"http://www.ad-mp.com/bundles/admppages/images/home/portfolio/trusteo.jpg\" alt=\"";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "url", array()), "html", null, true);
            echo "\" src=\"http://www.ad-mp.com/bundles/admppages/images/home/portfolio/";
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "image", array()), "html", null, true);
            echo "\">
                                            <div style=\"display: none;\" class=\"imgMask\">
                                            </div>
                                        </a>
                                        <div id=\"myModal";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "id", array()), "html", null, true);
            echo "\" class=\"reveal-modal zoomContent medium\" data-reveal style=\"display: none;\">
                                            <div class=\"titlePortfolio\">
                                                <h1>";
            // line 68
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "name", array()), "html", null, true);
            echo "</h1>
                                            </div>

                                            <div class=\"wrapperPortfolio\">
                                                <div class=\"sideLeftPortfolio\">
                                                    <img alt=\"www.trusteopro.com\" src=\"http://www.ad-mp.com/bundles/admppages/images/home/portfolio/";
            // line 73
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "image", array()), "html", null, true);
            echo "\">
                                                    <h3>Publication</h3>
                                                    <p>";
            // line 75
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["project"], "date", array())), "html", null, true);
            echo "</p>
                                                    <h3>Site</h3>
                                                    <a class=\"url_site\" href=\"http://";
            // line 77
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "url", array()), "html", null, true);
            echo "\" target=\"_blank\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "url", array()), "html", null, true);
            echo "</a>
                                                </div>
                                                <div class=\"sideRightPortfolio\">
                                                    ";
            // line 80
            echo $this->getAttribute($context["project"], "description", array());
            echo "
                                                </div>
                                            </div>
                                            <div class=\"sideBottomPortfolio\">
                                                <ul class=\"screens\">
                                                    <li>
                                                        <img alt=\"";
            // line 86
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "url", array()), "html", null, true);
            echo "\" src=\"http://www.ad-mp.com/bundles/admppages/images/home/portfolio/screens/";
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "screen1", array()), "html", null, true);
            echo "\">
                                                    </li>
                                                    <li>
                                                        <img alt=\"";
            // line 89
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "url", array()), "html", null, true);
            echo "\" src=\"http://www.ad-mp.com/bundles/admppages/images/home/portfolio/screens/";
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "screen2", array()), "html", null, true);
            echo "\">
                                                    </li>
                                                    <li>
                                                        <img alt=\"";
            // line 92
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "url", array()), "html", null, true);
            echo "\" src=\"http://www.ad-mp.com/bundles/admppages/images/home/portfolio/screens/";
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "screen3", array()), "html", null, true);
            echo "\">
                                                    </li>
                                                </ul>
                                            </div>
                                            <a class=\"close-reveal-modal\">&#215;</a>
                                        </div>
                                                    <br/>
                                        <span><a href=\"http://";
            // line 99
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "url", array()), "html", null, true);
            echo "\" target=\"_blank\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "name", array()), "html", null, true);
            echo "</a></span>
                                    </li>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['project'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 102
        echo "                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "SitePagesBundle:Portfolio:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  246 => 102,  235 => 99,  223 => 92,  215 => 89,  207 => 86,  198 => 80,  190 => 77,  185 => 75,  180 => 73,  172 => 68,  167 => 66,  158 => 62,  152 => 61,  149 => 60,  145 => 59,  136 => 52,  133 => 51,  105 => 25,  91 => 23,  87 => 18,  81 => 16,  78 => 15,  73 => 12,  53 => 11,  49 => 6,  44 => 5,  41 => 4,  37 => 1,  35 => 2,  11 => 1,);
    }
}
