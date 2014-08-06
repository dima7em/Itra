<?php

/* AcmeDemoBundle:Demo:index.html.twig */
class __TwigTemplate_d994ebb9954517f4d3c80d002b0e4c81a26aa3a5b5fcf7e8db05549cc8dabd5e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AcmeDemoBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content_header' => array($this, 'block_content_header'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AcmeDemoBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Symfony - Demos";
    }

    // line 5
    public function block_content_header($context, array $blocks = array())
    {
        echo "";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "    <h1 class=\"title\">Available demos</h1>
    <ul id=\"demo-list\">
        <li><a href=\"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("_demo_hello", array("name" => "World"));
        echo "\">Hello World</a></li>
        <li><a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("_demo_secured_hello", array("name" => "World"));
        echo "\">Access the secured area</a> <a href=\"";
        echo $this->env->getExtension('routing')->getPath("_demo_login");
        echo "\">Go to the login page</a></li>
        ";
        // line 13
        echo "    </ul>
";
    }

    public function getTemplateName()
    {
        return "AcmeDemoBundle:Demo:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 28,  110 => 22,  90 => 32,  100 => 37,  58 => 19,  113 => 54,  1082 => 340,  1076 => 338,  1070 => 336,  1068 => 335,  1066 => 334,  1062 => 333,  1053 => 332,  1050 => 331,  1038 => 326,  1032 => 324,  1026 => 322,  1024 => 321,  1022 => 320,  1018 => 319,  1012 => 318,  1009 => 317,  997 => 312,  991 => 310,  985 => 308,  983 => 307,  981 => 306,  977 => 305,  973 => 304,  969 => 303,  965 => 302,  959 => 301,  956 => 300,  948 => 296,  944 => 295,  941 => 294,  932 => 287,  930 => 286,  926 => 285,  923 => 284,  918 => 280,  910 => 278,  906 => 277,  904 => 276,  902 => 275,  899 => 274,  893 => 271,  890 => 270,  886 => 267,  883 => 265,  881 => 264,  878 => 263,  871 => 259,  869 => 258,  845 => 257,  842 => 255,  839 => 253,  837 => 252,  835 => 251,  832 => 250,  828 => 247,  826 => 246,  824 => 245,  821 => 244,  817 => 239,  814 => 238,  810 => 235,  808 => 234,  806 => 233,  803 => 232,  799 => 229,  797 => 228,  795 => 227,  793 => 226,  791 => 225,  788 => 224,  784 => 221,  781 => 216,  776 => 212,  756 => 208,  753 => 206,  750 => 205,  747 => 203,  744 => 202,  741 => 200,  739 => 199,  737 => 198,  734 => 197,  730 => 192,  728 => 191,  725 => 190,  721 => 187,  719 => 186,  716 => 185,  706 => 182,  703 => 180,  701 => 179,  698 => 178,  694 => 175,  692 => 174,  689 => 173,  685 => 170,  683 => 169,  680 => 168,  675 => 165,  673 => 164,  670 => 163,  665 => 160,  663 => 159,  660 => 158,  656 => 155,  654 => 154,  651 => 153,  647 => 150,  645 => 149,  642 => 148,  638 => 145,  635 => 144,  631 => 141,  629 => 140,  626 => 139,  622 => 136,  619 => 135,  616 => 133,  611 => 129,  601 => 128,  596 => 127,  594 => 126,  591 => 124,  589 => 123,  586 => 122,  581 => 118,  579 => 116,  578 => 115,  577 => 114,  576 => 113,  572 => 112,  569 => 110,  567 => 109,  564 => 108,  558 => 104,  556 => 103,  554 => 102,  552 => 101,  550 => 100,  546 => 99,  543 => 97,  541 => 96,  538 => 95,  524 => 92,  521 => 91,  507 => 88,  504 => 87,  479 => 82,  476 => 80,  472 => 78,  467 => 77,  465 => 76,  448 => 75,  445 => 74,  441 => 71,  439 => 70,  431 => 66,  429 => 65,  425 => 63,  414 => 60,  412 => 59,  404 => 58,  401 => 57,  399 => 56,  397 => 55,  394 => 54,  389 => 51,  383 => 49,  377 => 47,  373 => 46,  370 => 45,  357 => 37,  349 => 34,  346 => 33,  342 => 30,  339 => 28,  334 => 26,  330 => 23,  328 => 22,  326 => 21,  323 => 19,  321 => 18,  317 => 17,  300 => 13,  295 => 11,  290 => 7,  287 => 5,  282 => 3,  275 => 330,  270 => 316,  265 => 299,  263 => 294,  260 => 293,  257 => 291,  255 => 284,  250 => 274,  245 => 270,  242 => 269,  237 => 262,  232 => 249,  222 => 238,  212 => 224,  207 => 216,  194 => 197,  191 => 196,  188 => 194,  186 => 190,  181 => 185,  178 => 184,  161 => 162,  146 => 147,  134 => 133,  129 => 122,  126 => 121,  124 => 108,  114 => 91,  104 => 37,  84 => 29,  81 => 34,  76 => 17,  70 => 29,  53 => 11,  480 => 162,  474 => 79,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 69,  435 => 146,  430 => 144,  427 => 64,  423 => 62,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 48,  379 => 119,  374 => 116,  368 => 112,  365 => 41,  362 => 39,  360 => 38,  355 => 106,  341 => 105,  337 => 27,  322 => 101,  314 => 16,  312 => 98,  309 => 97,  305 => 95,  298 => 12,  294 => 90,  285 => 4,  283 => 88,  278 => 331,  268 => 300,  264 => 84,  258 => 81,  252 => 283,  247 => 273,  241 => 77,  229 => 73,  220 => 70,  214 => 231,  177 => 65,  169 => 168,  140 => 55,  132 => 51,  128 => 49,  107 => 36,  61 => 12,  273 => 317,  269 => 94,  254 => 92,  243 => 88,  240 => 263,  238 => 85,  235 => 250,  230 => 244,  227 => 243,  224 => 241,  221 => 77,  219 => 237,  217 => 232,  208 => 68,  204 => 215,  179 => 69,  159 => 158,  143 => 56,  135 => 53,  119 => 48,  102 => 17,  71 => 26,  67 => 26,  63 => 24,  59 => 13,  38 => 6,  94 => 34,  89 => 37,  85 => 38,  75 => 27,  68 => 14,  56 => 11,  87 => 30,  21 => 2,  26 => 9,  93 => 28,  88 => 31,  78 => 26,  46 => 14,  27 => 4,  44 => 12,  31 => 3,  28 => 3,  201 => 213,  196 => 211,  183 => 189,  171 => 173,  166 => 167,  163 => 62,  158 => 67,  156 => 157,  151 => 152,  142 => 59,  138 => 54,  136 => 138,  121 => 107,  117 => 19,  105 => 18,  91 => 30,  62 => 20,  49 => 10,  24 => 4,  25 => 3,  19 => 1,  79 => 28,  72 => 16,  69 => 24,  47 => 8,  40 => 6,  37 => 5,  22 => 2,  246 => 90,  157 => 56,  145 => 46,  139 => 139,  131 => 132,  123 => 48,  120 => 20,  115 => 43,  111 => 90,  108 => 19,  101 => 73,  98 => 45,  96 => 53,  83 => 29,  74 => 30,  66 => 10,  55 => 15,  52 => 10,  50 => 21,  43 => 7,  41 => 5,  35 => 5,  32 => 4,  29 => 3,  209 => 223,  203 => 78,  199 => 212,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 178,  173 => 177,  168 => 72,  164 => 163,  162 => 57,  154 => 153,  149 => 148,  147 => 58,  144 => 144,  141 => 143,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 43,  112 => 43,  109 => 87,  106 => 50,  103 => 32,  99 => 54,  95 => 28,  92 => 35,  86 => 36,  82 => 28,  80 => 29,  73 => 16,  64 => 13,  60 => 22,  57 => 12,  54 => 22,  51 => 14,  48 => 9,  45 => 8,  42 => 7,  39 => 10,  36 => 5,  33 => 3,  30 => 3,);
    }
}
