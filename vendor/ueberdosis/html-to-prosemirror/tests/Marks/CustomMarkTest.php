<?php

namespace HtmlToProseMirror\Test\Marks;

use HtmlToProseMirror\Renderer;
use HtmlToProseMirror\Test\TestCase;

class CustomMarkTest extends TestCase
{
    /** @test */
    public function b_and_strong_get_rendered_correctly()
    {
        $html = '<p><span data-foo="bla bla" bar="nanana">Example text inside custom mark</span> and some more text.</p>';

        $json = [
            'type'    => 'doc',
            'content' => [
                [
                    'type'    => 'paragraph',
                    'content' => [
                        [
                            'type'  => 'text',
                            'text'  => 'Example text inside custom mark',
                            'marks' => [
                                [
                                    'type' => 'custom',
                                    'attrs' => [
                                        'foo' => 'bla bla',
                                        'bar' => 'nanana',
                                    ],
                                ],
                            ],
                        ],
                        [
                            'type' => 'text',
                            'text' => ' and some more text.',
                        ],
                    ],
                ],
            ],
        ];

        $renderer = (new Renderer())->addMark(Custom::class);

        $this->assertEquals($json, $renderer->render($html));
    }
}
