<?php

namespace HtmlToProseMirror\Test;

use HtmlToProseMirror\Renderer;

class KeepContentOfUnknownTagsTest extends TestCase
{
    /** @test */
    public function keeps_content_of_unknown_tags()
    {
        $html = "<p>Example <x-unknown-tag>Text</x-unknown-tag></p>";

        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'paragraph',
                    'content' => [
                        [
                            'type' => 'text',
                            'text' => "Example ",
                        ],
                        [
                            'type' => 'text',
                            'text' => "Text",
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals($json, (new Renderer)->render($html));
    }

    /** @test */
    public function keeps_content_of_unknown_tags_even_if_it_has_known_tags()
    {
        $html = "<p>Example <x-unknown-tag><b>Text</b></x-unknown-tag></p>";

        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'paragraph',
                    'content' => [
                        [
                            'type' => 'text',
                            'text' => "Example ",
                        ],
                        [
                            'type' => 'text',
                            'text' => "Text",
                            'marks' => [
                                [
                                    'type' => 'bold',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals($json, (new Renderer)->render($html));
    }
}
