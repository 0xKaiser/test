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

/* application/links/direct/block-direct-linkset-edit-table/layout.js.twig */
class __TwigTemplate_0ccd8846d32d76548a05fc0ef2674947 extends Template
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
        echo "oWidget";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["oUIBlock"] ?? null), "oUILinksDirectWidget", [], "any", false, false, false, 4), "GetInputId", [], "method", false, false, false, 4), "html", null, true);
        echo " = \$('#";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["oUIBlock"] ?? null), "oUILinksDirectWidget", [], "any", false, false, false, 4), "GetInputId", [], "method", false, false, false, 4), "html", null, true);
        echo "').directlinks({
    class_name: '";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["oUIBlock"] ?? null), "oUILinksDirectWidget", [], "any", false, false, false, 5), "GetClass", [], "method", false, false, false, 5), "html", null, true);
        echo "',
    att_code: '";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["oUIBlock"] ?? null), "oUILinksDirectWidget", [], "any", false, false, false, 6), "GetAttCode", [], "method", false, false, false, 6), "html", null, true);
        echo "',
    input_name: '";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oUIBlock"] ?? null), "sInputName", [], "any", false, false, false, 7), "html", null, true);
        echo "',
    submit_to: '";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oUIBlock"] ?? null), "sSubmitUrl", [], "any", false, false, false, 8), "html", null, true);
        echo "',
    oWizardHelper: ";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oUIBlock"] ?? null), "sWizHelper", [], "any", false, false, false, 9), "html", null, true);
        echo ",
    do_search: '";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oUIBlock"] ?? null), "sJSDoSearch", [], "any", false, false, false, 10), "html", null, true);
        echo "'
});
";
        $___internal_parse_0_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 3
        echo twig_spaceless($___internal_parse_0_);
    }

    public function getTemplateName()
    {
        return "application/links/direct/block-direct-linkset-edit-table/layout.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 3,  66 => 10,  62 => 9,  58 => 8,  54 => 7,  50 => 6,  46 => 5,  39 => 4,  37 => 3,);
    }

    public function getSourceContext()
    {
        return new Source("", "application/links/direct/block-direct-linkset-edit-table/layout.js.twig", "C:\\xampp\\htdocs\\it\\web\\templates\\application\\links\\direct\\block-direct-linkset-edit-table\\layout.js.twig");
    }
}
