<?php

namespace ProseMirrorToHtml\Nodes;

class BulletList extends Node
{
    protected $nodeType = 'bullet_list';
    protected $tagName = 'ul';
}
