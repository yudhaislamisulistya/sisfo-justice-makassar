<?php

namespace HtmlToProseMirror\Test\Marks;

use HtmlToProseMirror\Marks\Mark;

class Custom extends Mark
{
    public function matching()
    {
        return $this->DOMNode->nodeName === 'span';
    }

    public function data()
    {
        $data = [
            'type' => 'custom',
        ];

        $attrs = [];

        if ($foo = $this->DOMNode->getAttribute('data-foo')) {
            $attrs['foo'] = $foo;
        }

        if ($bar = $this->DOMNode->getAttribute('bar')) {
            $attrs['bar'] = $bar;
        }

        $data['attrs'] = $attrs;

        return $data;
    }
}
