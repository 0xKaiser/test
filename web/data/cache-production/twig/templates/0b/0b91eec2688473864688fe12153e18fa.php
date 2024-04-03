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

/* base/components/text/layout.html.twig */
class __TwigTemplate_58c3e6f1090ee566b1bf7161c1199b07 extends Template
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
        echo "    ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["oUIBlock"] ?? null), "GetText", [], "method", false, false, false, 4), "html", null, true);
        echo "
";
        $___internal_parse_1_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 3
        echo twig_spaceless($___internal_parse_1_);
    }

    public function getTemplateName()
    {
        return "base/components/text/layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 3,  39 => 4,  37 => 3,);
    }

    public function getSourceContext()
    {
        return new Source("", "base/components/text/layout.html.twig", "C:\\xampp\\htdocs\\it\\web\\templates\\base\\components\\text\\layout.html.twig");
    }
}
