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

/* templates/pages/backoffice/welcome_popup/welcome_popup.html.twig */
class __TwigTemplate_2531cd3cea89a9699bafe4397a660bf0 extends Template
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
        // line 1
        echo "<div id=\"welcome_popup\">
    <div class=\"ibo-welcome-popup--image ibo-svg-illustration--container\">
        ";
        // line 3
        echo twig_source($this->env, "images/illustrations/undraw_relaunch_day.svg");
        echo "
    </div>
    <div class=\"ibo-welcome-popup--text\">
        <div>
            ";
        // line 7
        echo $this->env->getFilter('dict_s')->getCallable()("UI:WelcomeMenu:Text");
        echo "
        </div>
        <div class=\"ibo-welcome-popup--text--options\">
        <input type=\"checkbox\" checked id=\"display_welcome_popup\"/><label for=\"display_welcome_popup\">";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getFilter('dict_s')->getCallable()("UI:DisplayThisMessageAtStartup"), "html", null, true);
        echo "</label>
        </div>
    </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "templates/pages/backoffice/welcome_popup/welcome_popup.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 10,  48 => 7,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "templates/pages/backoffice/welcome_popup/welcome_popup.html.twig", "C:\\xampp\\htdocs\\it\\web\\templates\\pages\\backoffice\\welcome_popup\\welcome_popup.html.twig");
    }
}
