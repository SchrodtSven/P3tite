<?php

declare(strict_types=1);
/**
 * Class representing HTML in general
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P3tite
 * @package P3tite
 * @version 0.1
 * @since 2022-08-15
 * 
 */

namespace P3tite\Frontend\Html;

class General
{

    public const ELEMENTS = [
        'a', 'abbr', 'acronym', 'address', 'applet', 'area', 'article', 'aside',
        'audio', 'b', 'base', 'basefont', 'bb', 'bdo', 'big', 'blockquote', 'body',
        'br', 'button', 'canvas', 'caption', 'center', 'cite', 'code', 'col',
        'colgroup', 'command', 'datagrid', 'datalist', 'dd', 'del', 'details', 'dfn',
        'dialog', 'dir', 'div', 'dl', 'dt', 'em', 'embed', 'eventsource', 'fieldset',
        'figcaption', 'figure', 'font', 'footer', 'form', 'frame', 'frameset', 'h1', 'h2',
        'h3', 'h4', 'h5', 'h6', 'head', 'header', 'hgroup', 'hr', 'html', 'i', 'iframe', 
        'img', 'input','ins', 'isindex', 'kbd', 'keygen', 'label', 'legend', 'li', 'link', 
        'map','mark', 'menu', 'meta', 'meter', 'nav', 'noframes', 'noscript', 'object', 'ol',
        'optgroup', 'option', 'output', 'p', 'param', 'pre', 'progress', 'q', 'rp',
        'rt', 'ruby', 's', 'samp', 'script', 'section', 'select', 'small', 'source',
        'span', 'strike', 'strong', 'style', 'sub', 'sup', 'table', 'tbody', 'td',
        'textarea', 'tfoot', 'th', 'thead', 'time', 'title', 'tr', 'track', 'tt', 'u',
        'ul', 'var', 'video', 'wbr'
    ];

    public const GLOBAL_ATTRIBUTES =
    [
        'accesskey', 'autocapitalize', 'autofocus', 'class','contenteditable', 'Deprecated', 
        'contextmenu','dir', 'draggable', 'enterkeyhint', 'exportparts', 'hidden','id', 'inputmode', 
        'is', 'itemid', 'itemprop', 'itemref','itemscope', 'itemtype', 'lang', 'nonce', 'part', 
        'slot','spellcheck', 'style', 'tabindex', 'title', 'translate'
    ];

    public const CUSTOM_DATA_ATTRIBUTE_PREFIX = 'data-';



}
