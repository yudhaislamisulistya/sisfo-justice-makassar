/*
 * *
 *  *  * Copyright (C) optimoapps.com - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com>, ManiKandan<smanikandanit@gmail.com >
 *  *
 *
 */
const { core: commands } = Statamic.$bard.tiptap;
const { markInputRule } = commands;
export default class TextAlign {
  name() {
    return "textAlign";
  }

  schema() {
    return {
      attrs: {
        align: {
          default: "left",
        },
      },
      parseDOM: [
        {
          style: "text-align",
          getAttrs: (value) => ({ align: value }),
        },
      ],
      toDOM: (mark) => [
        "span",
        { style: `text-align: ${mark.attrs.align}; display: block` },
        0,
      ],
    };
  }

  commands({ type, updateMark }) {
    return (attrs) => updateMark(type, attrs);
  }

  pasteRules({ type }) {
    return [];
  }

  inputRules({ type }) {
    return [markInputRule(/(?:\*\*|__)([^*_]+)(?:\*\*|__)$/, type)];
  }

  plugins() {
    return [];
  }
}
