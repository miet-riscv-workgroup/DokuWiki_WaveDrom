<?php
/**
 * DokuWiki Plugin wavedrom (Action Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  Evgeni Primakov <conf@confusion.su>
 */

// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();

class action_plugin_wavedrom extends DokuWiki_Action_Plugin {

    /**
     * Registers a callback function for a given event
     *
     * @param Doku_Event_Handler $controller DokuWiki's event controller object
     * @return void
     */
    public function register(Doku_Event_Handler $controller) {

       $controller->register_hook('TPL_METAHEADER_OUTPUT', 'BEFORE', $this, '_hookjs');
   
    }

    /**
     * [Custom event handler which performs action]
     *
     * @param Doku_Event $event  event object by reference
     * @param mixed      $param  [the parameters passed as fifth argument to register_hook() when this
     *                           handler was registered]
     * @return void
     */

    public function _hookjs(Doku_Event &$event, $param) {
        $event->data['script'][] = array(
                            'type'    => 'text/javascript',
                            //'charset' => 'utf-8',
                            '_data'   => '',
                            'src'     => DOKU_BASE.'lib/plugins/wavedrom/inc/skins/default.js');

        $event->data['script'][] = array(
                            'type'    => 'text/javascript',
                            //'charset' => 'utf-8',
                            '_data'   => '',
                            'src'     => DOKU_BASE.'lib/plugins/wavedrom/inc/skins/narrow.js');

        $event->data['script'][] = array(
                            'type'    => 'text/javascript',
                            //'charset' => 'utf-8',
                            '_data'   => '',
                            'src'     => DOKU_BASE.'lib/plugins/wavedrom/inc/wavedrom.min.js');

        $event->data['script'][] = array(
                            'type'    => 'text/javascript',
                            //'charset' => 'utf-8',
                            '_data'   => '',
                            'src'     => DOKU_BASE.'lib/plugins/wavedrom/inc/wavedrom.min.js');


        $event->data['link'][] = array('rel' => 'stylesheet',
                            'type' => 'text/css',
                            'href' => 'http://fonts.googleapis.com/css?family=Roboto|Droid+Sans+Mono|Varela+Round');
    }

}

// vim:ts=4:sw=4:et:
