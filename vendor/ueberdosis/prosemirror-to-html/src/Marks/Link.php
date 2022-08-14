<?php

namespace ProseMirrorToHtml\Marks;

class Link extends Mark
{
    protected $markType = 'link';
    protected $tagName = 'a';

    public function tag()
    {
        $attrs = [];

        if (isset($this->mark->attrs->target)) {
            $attrs['target'] = $this->mark->attrs->target;
        }

        if (isset($this->mark->attrs->rel)) {
            $attrs['rel'] = $this->mark->attrs->rel;
        }

        if (isset($this->mark->attrs->title)) {
            $attrs['title'] = $this->mark->attrs->title;
        }

        $attrs['href'] = $this->mark->attrs->href;

        return [
            [
                'tag' => $this->tagName,
                'attrs' => $attrs,
            ],
        ];
    }
}
