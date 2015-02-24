<?php

/* base.html.twig */
class __TwigTemplate_231d297f5f611418d4036cc6f669bddc7055a204dbb17a52275f6804a00f7daf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
            'document_ready' => array($this, 'block_document_ready'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo " 
<!doctype html>
<html class=\"no-js\" lang=\"fr\">
    <head>
        <meta charset=\"utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />
        <title>";
        // line 7
        if (array_key_exists("page_title", $context)) {
            echo twig_escape_filter($this->env, (isset($context["page_title"]) ? $context["page_title"] : $this->getContext($context, "page_title")), "html", null, true);
            echo " | ";
        }
        echo "MedZoner.com</title>

        ";
        // line 9
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 19
        echo "
        ";
        // line 20
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "a7706ea_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a7706ea_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/a7706ea_modernizr_1.js");
            // line 23
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        } else {
            // asset "a7706ea"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a7706ea") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/a7706ea.js");
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        }
        unset($context["asset_url"]);
        // line 25
        echo "
    </head>
    <body>
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"large-12 columns\">
                    <header>
                        <div id=\"logo\">
                            <p>WWW.MEDZONER.COM</p>
                            <p>WEB &amp; OPENSOURCE</p>
                        </div>
                    </header>
                    <nav class=\"top-bar\" data-topbar>
                        <ul class=\"title-area\">
                            <li class=\"name\">
                            </li>
                            <!-- Remove the class \"menu-icon\" to get rid of menu icon. Take out \"Menu\" to just have icon alone -->
                            <li class=\"toggle-topbar menu-icon\"><a href=\"#\"><span>Menu</span></a></li>
                        </ul>
                        <section class=\"top-bar-section\">
                            ";
        // line 45
        echo $this->env->getExtension('knp_menu')->render("SitePagesBundle:Builder:mainMenu", array("class" => "right", "currentClass" => "active"));
        echo "
                    ";
        // line 63
        echo "                        </section>
                        ";
        // line 64
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 65
            echo "                            <section class=\"top-bar-section\">
                                <ul class=\"left\">
                                    <li><p>Administration : </p></li>
                                    <li>
                                        <a href=\"";
            // line 69
            echo $this->env->getExtension('routing')->getPath("site_blog_new");
            echo "\" />";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("new post"), "html", null, true);
            echo "</a>
                                    </li>
                                </ul>
                            </section>
                        ";
        }
        // line 74
        echo "                    </nav>
                </div>
            </div>
        ";
        // line 77
        $this->displayBlock('body', $context, $blocks);
        // line 78
        echo "    ";
        $this->displayBlock('content', $context, $blocks);
        // line 79
        echo "    <footer>
        <div class=\"row\">
            <div class=\"large-8 columns\">
                &copy; 2014 Mehdi Youb - Développeur Web | HTML5, Jquery, PHP5, MySQL
            </div>
            <div class=\"large-4 columns\">
                <a href=\"";
        // line 85
        echo $this->env->getExtension('routing')->getPath("site_contact");
        echo "\">contact</a> 
            </div>
        </div>
    </footer>
</div>
";
        // line 90
        $this->displayBlock('javascripts', $context, $blocks);
        // line 106
        echo "
<script type=\"text/javascript\">
    \$(document).ready(function () {
        \$(document).foundation({
            reveal: {
                animation_speed: 500
            },
            tooltip: {
                disable_for_touch: true
            },
            topbar: {
                custom_back_text: false,
                is_hover: true,
                mobile_show_parent_link: true
            }
        });
";
        // line 122
        $this->displayBlock('document_ready', $context, $blocks);
        // line 123
        echo "    });
</script>
</body>
</html>";
    }

    // line 9
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 10
        echo "            ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "65a924f_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_65a924f_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/65a924f_foundation.min_1.css");
            // line 16
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
            ";
            // asset "65a924f_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_65a924f_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/65a924f_global_2.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
            ";
            // asset "65a924f_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_65a924f_2") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/65a924f_blog_3.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
            ";
        } else {
            // asset "65a924f"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_65a924f") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/65a924f.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
            ";
        }
        unset($context["asset_url"]);
        // line 17
        echo "  
        ";
    }

    // line 77
    public function block_body($context, array $blocks = array())
    {
    }

    // line 78
    public function block_content($context, array $blocks = array())
    {
    }

    // line 90
    public function block_javascripts($context, array $blocks = array())
    {
        // line 91
        echo "    ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "d7d6da2_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d7d6da2_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/d7d6da2_jquery_1.js");
            // line 103
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "d7d6da2_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d7d6da2_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/d7d6da2_fastclick_2.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "d7d6da2_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d7d6da2_2") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/d7d6da2_foundation.min_3.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "d7d6da2_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d7d6da2_3") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/d7d6da2_foundation.alert_4.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "d7d6da2_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d7d6da2_4") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/d7d6da2_foundation.dropdown_5.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "d7d6da2_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d7d6da2_5") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/d7d6da2_foundation.tab_6.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "d7d6da2_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d7d6da2_6") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/d7d6da2_foundation.topbar_7.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "d7d6da2_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d7d6da2_7") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/d7d6da2_foundation.orbit_8.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "d7d6da2_8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d7d6da2_8") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/d7d6da2_orbit_9.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "d7d6da2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d7d6da2") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/d7d6da2.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
    }

    // line 122
    public function block_document_ready($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  286 => 122,  222 => 103,  217 => 91,  214 => 90,  209 => 78,  204 => 77,  199 => 17,  173 => 16,  168 => 10,  165 => 9,  158 => 123,  156 => 122,  138 => 106,  136 => 90,  128 => 85,  120 => 79,  117 => 78,  115 => 77,  110 => 74,  100 => 69,  94 => 65,  92 => 64,  89 => 63,  85 => 45,  63 => 25,  49 => 23,  45 => 20,  42 => 19,  40 => 9,  32 => 7,  24 => 1,);
    }
}
