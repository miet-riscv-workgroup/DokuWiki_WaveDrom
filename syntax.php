<?php
/**
 * DokuWiki Plugin wavedrom (Syntax Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  Evgeni Primakov <conf@confusion.su>
 */

// must be run within Dokuwiki
if (!defined('DOKU_INC')) die();

class syntax_plugin_wavedrom extends DokuWiki_Syntax_Plugin {
    /**
     * @return string Syntax mode type
     */
    public function getType() {
        return 'protected';
    }
    /**
     * @return string Paragraph type
     */
    public function getPType() {
        return 'normal';
    }
    /**
     * @return int Sort order - Low numbers go before high numbers
     */
    public function getSort() {
        return 999;
    }

    /**
     * Connect lookup pattern to lexer.
     *
     * @param string $mode Parser mode
     */
    public function connectTo($mode) {
        $this->Lexer->addSpecialPattern('<wave\b.*?</wave>',$mode,'plugin_wavedrom');
    }


    /**
     * Handle matches of the wavedrom syntax
     *
     * @param string          $match   The match of the syntax
     * @param int             $state   The state of the handler
     * @param int             $pos     The position in the document
     * @param Doku_Handler    $handler The handler
     * @return array Data for the renderer
     */
    public function handle($match, $state, $pos, Doku_Handler $handler){

        $data = str_replace(array("<wave>","</wave>"), "", $match);
        $data = strip_tags ($data);

        return $data;
    }

    /**
     * Render xhtml output or metadata
     *
     * @param string         $mode      Renderer mode (supported modes: xhtml)
     * @param Doku_Renderer  $renderer  The renderer
     * @param array          $data      The data from the handler() function
     * @return bool If rendering was successful.
     */
    public function render($mode, Doku_Renderer $renderer, $data) {
        if($mode != 'xhtml') return false;
            $renderer->doc .= '<script type="WaveDrom">';
            $renderer->doc .= $data;
            $renderer->doc .= '</script>';

            $renderer->doc .= '<script>(function(){ window.addEventListener("load", WaveDrom.ProcessAll, false); })();</script>';
        return true;
    }
}

// vim:ts=4:sw=4:et:
