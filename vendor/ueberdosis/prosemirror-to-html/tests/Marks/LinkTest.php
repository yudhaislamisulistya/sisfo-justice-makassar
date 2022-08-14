<?php

namespace ProseMirrorToHtml\Test\Marks;

use ProseMirrorToHtml\Renderer;
use ProseMirrorToHtml\Test\TestCase;

class LinkTest extends TestCase
{
    /** @test */
    public function link_mark_gets_rendered_correctly()
    {
        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'text',
                    'text' => 'Example Link',
                    'marks' => [
                        [
                            'type' => 'link',
                            'attrs' => [
                                'href' => 'https://scrumpy.io',
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $html = '<a href="https://scrumpy.io">Example Link</a>';

        $this->assertEquals($html, (new Renderer)->render($json));
    }

    /** @test */
    public function link_mark_has_support_for_rel()
    {
        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'text',
                    'text' => 'Example Link',
                    'marks' => [
                        [
                            'type' => 'link',
                            'attrs' => [
                                'href' => 'https://scrumpy.io',
                                'rel' => 'noopener',
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $html = '<a rel="noopener" href="https://scrumpy.io">Example Link</a>';

        $this->assertEquals($html, (new Renderer)->render($json));
    }

    /** @test */
    public function link_mark_has_support_for_target()
    {
        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'text',
                    'text' => 'Example Link',
                    'marks' => [
                        [
                            'type' => 'link',
                            'attrs' => [
                                'href' => 'https://scrumpy.io',
                                'target' => '_blank',
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $html = '<a target="_blank" href="https://scrumpy.io">Example Link</a>';

        $this->assertEquals($html, (new Renderer)->render($json));
    }

    /** @test */
    public function link_mark_has_support_for_title()
    {
        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'text',
                    'text' => 'Example Link',
                    'marks' => [
                        [
                            'type' => 'link',
                            'attrs' => [
                                'href' => 'https://scrumpy.io',
                                'title' => 'Foo',
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $html = '<a title="Foo" href="https://scrumpy.io">Example Link</a>';

        $this->assertEquals($html, (new Renderer)->render($json));
    }

    /** @test */
    public function link_with_marks_generates_clean_output()
    {
        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'text',
                    'marks' => [
                        [
                            'type' => 'link',
                            'attrs' => [
                                'href' => 'https://example.com',
                            ],
                        ],
                    ],
                    'text' => 'Example ',
                ],
                [
                    'type' => 'text',
                    'marks' => [
                        [
                            'type' => 'link',
                            'attrs' => [
                                'href' => 'https://example.com',
                            ],
                        ],
                        [
                            'type' => 'bold',
                        ],
                    ],
                    'text' => 'Link',
                ],
            ],
        ];

        $html = '<a href="https://example.com">Example <strong>Link</strong></a>';

        $this->assertEquals($html, (new Renderer)->render($json));
    }

    /** @test */
    public function link_with_marks_inside_node_generates_clean_output()
    {
        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'paragraph',
                    'content' => [
                        [
                            'type' => 'text',
                            'marks' => [
                                [
                                    'type' => 'link',
                                    'attrs' => [
                                        'href' => 'https://example.com',
                                    ],
                                ],
                            ],
                            'text' => 'Example ',
                        ],
                        [
                            'type' => 'text',
                            'marks' => [
                                [
                                    'type' => 'link',
                                    'attrs' => [
                                        'href' => 'https://example.com',
                                    ],
                                ],
                                [
                                    'type' => 'bold',
                                ],
                            ],
                            'text' => 'Link',
                        ],
                    ],
                ],
            ],
        ];

        $html = '<p><a href="https://example.com">Example <strong>Link</strong></a></p>';

        $this->assertEquals($html, (new Renderer)->render($json));
    }
}
