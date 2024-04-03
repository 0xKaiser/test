<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* base/components/dashlet/dashlet-badge.html.twig */
class __TwigTemplate_09c329405c427ae267c1bb08044aa5f6 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        ob_start(function () { return ''; });
        // line 4
        echo "    <div class=\"ibo-dashlet-badge--body";
        if (twig_get_attribute($this->env, $this->source, ($context["oUIBlock"] ?? null), "IsHidden", [], "method", false, false, false, 4)) {
            echo " ibo-is-hidden";
        }
        echo "\" id=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oUIBlock"] ?? null), "GetId", [], "method", false, false, false, 4), "html", null, true);
        echo "\"
         data-role=\"ibo-dashlet-badge--body\"
         data-tooltip-content=\"";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oUIBlock"] ?? null), "GetClassLabel", [], "method", false, false, false, 6), "html", null, true);
        echo "\">
        <div class=\"ibo-dashlet-badge--icon-container\">
            ";
        // line 9
        echo "            <img class=\"ibo-dashlet-badge--icon\" src=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oUIBlock"] ?? null), "GetClassIconUrl", [], "method", false, false, false, 9), "html", null, true);
        echo "\" alt=\"\">
        </div>
        <div class=\"ibo-dashlet-badge--actions\">
            <a class=\"ibo-dashlet-badge--action-list\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oUIBlock"] ?? null), "GetHyperlink", [], "method", false, false, false, 12), "html", null, true);
        echo "\" data-role=\"ibo-dashlet-badge--action-list\">
                <span class=\"ibo-dashlet-badge--action-list-count\">";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oUIBlock"] ?? null), "GetCount", [], "method", false, false, false, 13), "html", null, true);
        echo "</span>
                <span class=\"ibo-dashlet-badge--action-list-label\">";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oUIBlock"] ?? null), "GetClassLabel", [], "method", false, false, false, 14), "html", null, true);
        echo "</span>
            </a>
            ";
        // line 16
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["oUIBlock"] ?? null), "GetCreateActionUrl", [], "method", false, false, false, 16))) {
            // line 17
            echo "                <a class=\"ibo-dashlet-badge--action-create\" href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oUIBlock"] ?? null), "GetCreateActionUrl", [], "method", false, false, false, 17), "html", null, true);
            echo "\">
                    <span class=\"ibo-dashlet-badge--action-create-icon fas fa-plus\"></span>
                    <span class=\"ibo-dashlet-badge--action-create-label\">";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oUIBlock"] ?? null), "GetCreateActionLabel", [], "method", false, false, false, 19), "html", null, true);
            echo "</span>
                </a>
            ";
        }
        // line 22
        echo "        </div>
    </div>
";
        $___internal_parse_7_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 3
        echo twig_spaceless($___internal_parse_7_);
    }

    public function getTemplateName()
    {
        return "base/components/dashlet/dashlet-badge.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 3,  88 => 22,  82 => 19,  76 => 17,  74 => 16,  69 => 14,  65 => 13,  61 => 12,  54 => 9,  49 => 6,  39 => 4,  37 => 3,);
    }

    public function getSourceContext()
    {
        return new Source("", "base/components/dashlet/dashlet-badge.html.twig", "C:\\xampp\\htdocs\\it\\web\\templates\\base\\components\\dashlet\\dashlet-badge.html.twig");
    }
}
