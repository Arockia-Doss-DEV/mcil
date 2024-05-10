<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>MCIL - MAINTENANCE</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <style>

    html {
    font-family: sans-serif;
    line-height: 1.15;
    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    }

    article, aside, figcaption, figure, footer, header, hgroup, main, nav, section {
    display: block;
    }

    body {
    margin: 0;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #222222;
    text-align: left;
    background-color: #ffffff;
    }

    [tabindex="-1"]:focus {
    outline: 0 !important;
    }

    hr {
    box-sizing: content-box;
    height: 0;
    overflow: visible;
    }

    h1, h2, h3, h4, h5, h6 {
    margin-top: 0;
    margin-bottom: 0.5rem;
    }

    p {
    margin-top: 0;
    margin-bottom: 1rem;
    }

    abbr[title],
    abbr[data-original-title] {
    text-decoration: underline;
    text-decoration: underline dotted;
    cursor: help;
    border-bottom: 0;
    text-decoration-skip-ink: none;
    }

    address {
    margin-bottom: 1rem;
    font-style: normal;
    line-height: inherit;
    }

    ol,
    ul,
    dl {
    margin-top: 0;
    margin-bottom: 1rem;
    }

    ol ol,
    ul ul,
    ol ul,
    ul ol {
    margin-bottom: 0;
    }

    dt {
    font-weight: 700;
    }

    dd {
    margin-bottom: .5rem;
    margin-left: 0;
    }

    blockquote {
    margin: 0 0 1rem;
    }

    b,
    strong {
    font-weight: bolder;
    }

    small {
    font-size: 80%;
    }

    sub,
    sup {
    position: relative;
    font-size: 75%;
    line-height: 0;
    vertical-align: baseline;
    }

    sub {
    bottom: -.25em;
    }

    sup {
    top: -.5em;
    }

    a {
    color: #4e73e5;
    text-decoration: none;
    background-color: transparent;
    }

    a:hover {
    color: #1e48c9;
    text-decoration: underline;
    }

    a:not([href]):not([tabindex]) {
    color: inherit;
    text-decoration: none;
    }

    a:not([href]):not([tabindex]):hover, a:not([href]):not([tabindex]):focus {
    color: inherit;
    text-decoration: none;
    }

    a:not([href]):not([tabindex]):focus {
    outline: 0;
    }

    pre,
    code,
    kbd,
    samp {
    font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
    font-size: 1em;
    }

    pre {
    margin-top: 0;
    margin-bottom: 1rem;
    overflow: auto;
    }

    figure {
    margin: 0 0 1rem;
    }

    img {
    vertical-align: middle;
    border-style: none;
    }

    svg {
    overflow: hidden;
    vertical-align: middle;
    }

    table {
    border-collapse: collapse;
    }

    caption {
    padding-top: 0.9375rem;
    padding-bottom: 0.9375rem;
    color: #B1BAC5;
    text-align: left;
    caption-side: bottom;
    }

    th {
    text-align: inherit;
    }

    label {
    display: inline-block;
    margin-bottom: 0.5rem;
    }

    button {
    border-radius: 0;
    }

    button:focus {
    outline: 1px dotted;
    outline: 5px auto -webkit-focus-ring-color;
    }

    input,
    button,
    select,
    optgroup,
    textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
    }

    button,
    input {
    overflow: visible;
    }

    button,
    select {
    text-transform: none;
    }

    select {
    word-wrap: normal;
    }

    button,
    [type="button"],
    [type="reset"],
    [type="submit"] {
    -webkit-appearance: button;
    }

    button:not(:disabled),
    [type="button"]:not(:disabled),
    [type="reset"]:not(:disabled),
    [type="submit"]:not(:disabled) {
    cursor: pointer;
    }

    button::-moz-focus-inner,
    [type="button"]::-moz-focus-inner,
    [type="reset"]::-moz-focus-inner,
    [type="submit"]::-moz-focus-inner {
    padding: 0;
    border-style: none;
    }

    input[type="radio"],
    input[type="checkbox"] {
    box-sizing: border-box;
    padding: 0;
    }

    input[type="date"],
    input[type="time"],
    input[type="datetime-local"],
    input[type="month"] {
    -webkit-appearance: listbox;
    }

    textarea {
    overflow: auto;
    resize: vertical;
    }

    fieldset {
    min-width: 0;
    padding: 0;
    margin: 0;
    border: 0;
    }

    legend {
    display: block;
    width: 100%;
    max-width: 100%;
    padding: 0;
    margin-bottom: .5rem;
    font-size: 1.5rem;
    line-height: inherit;
    color: inherit;
    white-space: normal;
    }

    progress {
    vertical-align: baseline;
    }

    [type="number"]::-webkit-inner-spin-button,
    [type="number"]::-webkit-outer-spin-button {
    height: auto;
    }

    [type="search"] {
    outline-offset: -2px;
    -webkit-appearance: none;
    }

    [type="search"]::-webkit-search-decoration {
    -webkit-appearance: none;
    }

    ::-webkit-file-upload-button {
    font: inherit;
    -webkit-appearance: button;
    }

    output {
    display: inline-block;
    }

    summary {
    display: list-item;
    cursor: pointer;
    }

    template {
    display: none;
    }

    [hidden] {
    display: none !important;
    }

    h1, h2, h3, h4, h5, h6,
    .h1, .h2, .h3, .h4, .h5, .h6 {
    margin-bottom: 0.5rem;
    font-weight: 500;
    line-height: 1.2;
    }

    h1, .h1 {
    font-size: 2.5rem;
    }

    h2, .h2 {
    font-size: 2rem;
    }

    h3, .h3 {
    font-size: 1.75rem;
    }

    h4, .h4 {
    font-size: 1.5rem;
    }

    h5, .h5 {
    font-size: 1.25rem;
    }

    h6, .h6 {
    font-size: 1rem;
    }

    .lead {
    font-size: 1.25rem;
    font-weight: 300;
    }

    .display-1 {
    font-size: 6rem;
    font-weight: 300;
    line-height: 1.2;
    }

    .display-2 {
    font-size: 5.5rem;
    font-weight: 300;
    line-height: 1.2;
    }

    .display-3 {
    font-size: 4.5rem;
    font-weight: 300;
    line-height: 1.2;
    }

    .display-4 {
    font-size: 3.5rem;
    font-weight: 300;
    line-height: 1.2;
    }

    hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0, 0, 0, 0.1);
    }

    small,
    .small {
    font-size: 80%;
    font-weight: 400;
    }

    mark,
    .mark {
    padding: 0.2em;
    background-color: #fcf8e3;
    }

    .list-unstyled {
    padding-left: 0;
    list-style: none;
    }

    .list-inline {
    padding-left: 0;
    list-style: none;
    }

    .list-inline-item {
    display: inline-block;
    }

    .list-inline-item:not(:last-child) {
    margin-right: 0.5rem;
    }

    .initialism {
    font-size: 90%;
    text-transform: uppercase;
    }

    .blockquote {
    margin-bottom: 1rem;
    font-size: 1.25rem;
    }

    .blockquote-footer {
    display: block;
    font-size: 80%;
    color: #6c757d;
    }

    .blockquote-footer::before {
    content: "\2014\00A0";
    }

    .img-fluid {
    max-width: 100%;
    height: auto;
    }

    .img-thumbnail {
    padding: 0.25rem;
    background-color: #ffffff;
    border: 1px solid #dee2e6;
    border-radius: 0.25rem;
    max-width: 100%;
    height: auto;
    }

    .figure {
    display: inline-block;
    }

    .figure-img {
    margin-bottom: 0.5rem;
    line-height: 1;
    }

    .figure-caption {
    font-size: 90%;
    color: #6c757d;
    }

    code {
    font-size: 87.5%;
    color: #e83e8c;
    word-break: break-word;
    }

    a > code {
    color: inherit;
    }

    kbd {
    padding: 0.2rem 0.4rem;
    font-size: 87.5%;
    color: #ffffff;
    background-color: #212529;
    border-radius: 0.2rem;
    }

    kbd kbd {
    padding: 0;
    font-size: 100%;
    font-weight: 700;
    }

    pre {
    display: block;
    font-size: 87.5%;
    color: #212529;
    }

    pre code {
    font-size: inherit;
    color: inherit;
    word-break: normal;
    }

    .pre-scrollable {
    max-height: 340px;
    overflow-y: scroll;
    }

    .container {
    width: 100%;
    padding-right: 0.9375rem;
    padding-left: 0.9375rem;
    margin-right: auto;
    margin-left: auto;
    }

    @media (min-width: 576px) {
    .container {
        max-width: 540px;
    }
    }

    @media (min-width: 768px) {
    .container {
        max-width: 720px;
    }
    }

    @media (min-width: 992px) {
    .container {
        max-width: 960px;
    }
    }

    @media (min-width: 1200px) {
        .container {
            max-width: 1140px;
        }
    }

    .row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -0.9375rem;
    margin-left: -0.9375rem;
    }

    .no-gutters {
    margin-right: 0;
    margin-left: 0;
    }

    .no-gutters > .col,
    .no-gutters > [class*="col-"] {
    padding-right: 0;
    padding-left: 0;
    }

    .col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col,
    .col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm,
    .col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md,
    .col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg,
    .col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl,
    .col-xl-auto {
    position: relative;
    width: 100%;
    padding-right: 0.9375rem;
    padding-left: 0.9375rem;
    }

    .col {
    flex-basis: 0;
    flex-grow: 1;
    max-width: 100%;
    }

    .col-auto {
    flex: 0 0 auto;
    width: auto;
    max-width: 100%;
    }

    .col-1 {
    flex: 0 0 8.33333%;
    max-width: 8.33333%;
    }

    .col-2 {
    flex: 0 0 16.66667%;
    max-width: 16.66667%;
    }

    .col-3 {
    flex: 0 0 25%;
    max-width: 25%;
    }

    .col-4 {
    flex: 0 0 33.33333%;
    max-width: 33.33333%;
    }

    .col-5 {
    flex: 0 0 41.66667%;
    max-width: 41.66667%;
    }

    .col-6 {
    flex: 0 0 50%;
    max-width: 50%;
    }

    .col-7 {
    flex: 0 0 58.33333%;
    max-width: 58.33333%;
    }

    .col-8 {
    flex: 0 0 66.66667%;
    max-width: 66.66667%;
    }

    .col-9 {
    flex: 0 0 75%;
    max-width: 75%;
    }

    .col-10 {
    flex: 0 0 83.33333%;
    max-width: 83.33333%;
    }

    .col-11 {
    flex: 0 0 91.66667%;
    max-width: 91.66667%;
    }

    .col-12 {
    flex: 0 0 100%;
    max-width: 100%;
    }

    .order-first {
    order: -1;
    }

    .order-last {
    order: 13;
    }

    .order-0 {
    order: 0;
    }

    .order-1 {
    order: 1;
    }

    .order-2 {
    order: 2;
    }

    .order-3 {
    order: 3;
    }

    .order-4 {
    order: 4;
    }

    .order-5 {
    order: 5;
    }

    .order-6 {
    order: 6;
    }

    .order-7 {
    order: 7;
    }

    .order-8 {
    order: 8;
    }

    .order-9 {
    order: 9;
    }

    .order-10 {
    order: 10;
    }

    .order-11 {
    order: 11;
    }

    .order-12 {
    order: 12;
    }

    .offset-1 {
    margin-left: 8.33333%;
    }

    .offset-2 {
    margin-left: 16.66667%;
    }

    .offset-3 {
    margin-left: 25%;
    }

    .offset-4 {
    margin-left: 33.33333%;
    }

    .offset-5 {
    margin-left: 41.66667%;
    }

    .offset-6 {
    margin-left: 50%;
    }

    .offset-7 {
    margin-left: 58.33333%;
    }

    .offset-8 {
    margin-left: 66.66667%;
    }

    .offset-9 {
    margin-left: 75%;
    }

    .offset-10 {
    margin-left: 83.33333%;
    }

    .offset-11 {
    margin-left: 91.66667%;
    }

    @media (min-width: 576px) {
    .col-sm {
        flex-basis: 0;
        flex-grow: 1;
        max-width: 100%;
    }
    .col-sm-auto {
        flex: 0 0 auto;
        width: auto;
        max-width: 100%;
    }
    .col-sm-1 {
        flex: 0 0 8.33333%;
        max-width: 8.33333%;
    }
    .col-sm-2 {
        flex: 0 0 16.66667%;
        max-width: 16.66667%;
    }
    .col-sm-3 {
        flex: 0 0 25%;
        max-width: 25%;
    }
    .col-sm-4 {
        flex: 0 0 33.33333%;
        max-width: 33.33333%;
    }
    .col-sm-5 {
        flex: 0 0 41.66667%;
        max-width: 41.66667%;
    }
    .col-sm-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }
    .col-sm-7 {
        flex: 0 0 58.33333%;
        max-width: 58.33333%;
    }
    .col-sm-8 {
        flex: 0 0 66.66667%;
        max-width: 66.66667%;
    }
    .col-sm-9 {
        flex: 0 0 75%;
        max-width: 75%;
    }
    .col-sm-10 {
        flex: 0 0 83.33333%;
        max-width: 83.33333%;
    }
    .col-sm-11 {
        flex: 0 0 91.66667%;
        max-width: 91.66667%;
    }
    .col-sm-12 {
        flex: 0 0 100%;
        max-width: 100%;
    }
    .order-sm-first {
        order: -1;
    }
    .order-sm-last {
        order: 13;
    }
    .order-sm-0 {
        order: 0;
    }
    .order-sm-1 {
        order: 1;
    }
    .order-sm-2 {
        order: 2;
    }
    .order-sm-3 {
        order: 3;
    }
    .order-sm-4 {
        order: 4;
    }
    .order-sm-5 {
        order: 5;
    }
    .order-sm-6 {
        order: 6;
    }
    .order-sm-7 {
        order: 7;
    }
    .order-sm-8 {
        order: 8;
    }
    .order-sm-9 {
        order: 9;
    }
    .order-sm-10 {
        order: 10;
    }
    .order-sm-11 {
        order: 11;
    }
    .order-sm-12 {
        order: 12;
    }
    .offset-sm-0 {
        margin-left: 0;
    }
    .offset-sm-1 {
        margin-left: 8.33333%;
    }
    .offset-sm-2 {
        margin-left: 16.66667%;
    }
    .offset-sm-3 {
        margin-left: 25%;
    }
    .offset-sm-4 {
        margin-left: 33.33333%;
    }
    .offset-sm-5 {
        margin-left: 41.66667%;
    }
    .offset-sm-6 {
        margin-left: 50%;
    }
    .offset-sm-7 {
        margin-left: 58.33333%;
    }
    .offset-sm-8 {
        margin-left: 66.66667%;
    }
    .offset-sm-9 {
        margin-left: 75%;
    }
    .offset-sm-10 {
        margin-left: 83.33333%;
    }
    .offset-sm-11 {
        margin-left: 91.66667%;
    }
    }

    @media (min-width: 768px) {
    .col-md {
        flex-basis: 0;
        flex-grow: 1;
        max-width: 100%;
    }
    .col-md-auto {
        flex: 0 0 auto;
        width: auto;
        max-width: 100%;
    }
    .col-md-1 {
        flex: 0 0 8.33333%;
        max-width: 8.33333%;
    }
    .col-md-2 {
        flex: 0 0 16.66667%;
        max-width: 16.66667%;
    }
    .col-md-3 {
        flex: 0 0 25%;
        max-width: 25%;
    }
    .col-md-4 {
        flex: 0 0 33.33333%;
        max-width: 33.33333%;
    }
    .col-md-5 {
        flex: 0 0 41.66667%;
        max-width: 41.66667%;
    }
    .col-md-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }
    .col-md-7 {
        flex: 0 0 58.33333%;
        max-width: 58.33333%;
    }
    .col-md-8 {
        flex: 0 0 66.66667%;
        max-width: 66.66667%;
    }
    .col-md-9 {
        flex: 0 0 75%;
        max-width: 75%;
    }
    .col-md-10 {
        flex: 0 0 83.33333%;
        max-width: 83.33333%;
    }
    .col-md-11 {
        flex: 0 0 91.66667%;
        max-width: 91.66667%;
    }
    .col-md-12 {
        flex: 0 0 100%;
        max-width: 100%;
    }
    .order-md-first {
        order: -1;
    }
    .order-md-last {
        order: 13;
    }
    .order-md-0 {
        order: 0;
    }
    .order-md-1 {
        order: 1;
    }
    .order-md-2 {
        order: 2;
    }
    .order-md-3 {
        order: 3;
    }
    .order-md-4 {
        order: 4;
    }
    .order-md-5 {
        order: 5;
    }
    .order-md-6 {
        order: 6;
    }
    .order-md-7 {
        order: 7;
    }
    .order-md-8 {
        order: 8;
    }
    .order-md-9 {
        order: 9;
    }
    .order-md-10 {
        order: 10;
    }
    .order-md-11 {
        order: 11;
    }
    .order-md-12 {
        order: 12;
    }
    .offset-md-0 {
        margin-left: 0;
    }
    .offset-md-1 {
        margin-left: 8.33333%;
    }
    .offset-md-2 {
        margin-left: 16.66667%;
    }
    .offset-md-3 {
        margin-left: 25%;
    }
    .offset-md-4 {
        margin-left: 33.33333%;
    }
    .offset-md-5 {
        margin-left: 41.66667%;
    }
    .offset-md-6 {
        margin-left: 50%;
    }
    .offset-md-7 {
        margin-left: 58.33333%;
    }
    .offset-md-8 {
        margin-left: 66.66667%;
    }
    .offset-md-9 {
        margin-left: 75%;
    }
    .offset-md-10 {
        margin-left: 83.33333%;
    }
    .offset-md-11 {
        margin-left: 91.66667%;
    }
    }

    @media (min-width: 992px) {
    .col-lg {
        flex-basis: 0;
        flex-grow: 1;
        max-width: 100%;
    }
    .col-lg-auto {
        flex: 0 0 auto;
        width: auto;
        max-width: 100%;
    }
    .col-lg-1 {
        flex: 0 0 8.33333%;
        max-width: 8.33333%;
    }
    .col-lg-2 {
        flex: 0 0 16.66667%;
        max-width: 16.66667%;
    }
    .col-lg-3 {
        flex: 0 0 25%;
        max-width: 25%;
    }
    .col-lg-4 {
        flex: 0 0 33.33333%;
        max-width: 33.33333%;
    }
    .col-lg-5 {
        flex: 0 0 41.66667%;
        max-width: 41.66667%;
    }
    .col-lg-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }
    .col-lg-7 {
        flex: 0 0 58.33333%;
        max-width: 58.33333%;
    }
    .col-lg-8 {
        flex: 0 0 66.66667%;
        max-width: 66.66667%;
    }
    .col-lg-9 {
        flex: 0 0 75%;
        max-width: 75%;
    }
    .col-lg-10 {
        flex: 0 0 83.33333%;
        max-width: 83.33333%;
    }
    .col-lg-11 {
        flex: 0 0 91.66667%;
        max-width: 91.66667%;
    }
    .col-lg-12 {
        flex: 0 0 100%;
        max-width: 100%;
    }
    .order-lg-first {
        order: -1;
    }
    .order-lg-last {
        order: 13;
    }
    .order-lg-0 {
        order: 0;
    }
    .order-lg-1 {
        order: 1;
    }
    .order-lg-2 {
        order: 2;
    }
    .order-lg-3 {
        order: 3;
    }
    .order-lg-4 {
        order: 4;
    }
    .order-lg-5 {
        order: 5;
    }
    .order-lg-6 {
        order: 6;
    }
    .order-lg-7 {
        order: 7;
    }
    .order-lg-8 {
        order: 8;
    }
    .order-lg-9 {
        order: 9;
    }
    .order-lg-10 {
        order: 10;
    }
    .order-lg-11 {
        order: 11;
    }
    .order-lg-12 {
        order: 12;
    }
    .offset-lg-0 {
        margin-left: 0;
    }
    .offset-lg-1 {
        margin-left: 8.33333%;
    }
    .offset-lg-2 {
        margin-left: 16.66667%;
    }
    .offset-lg-3 {
        margin-left: 25%;
    }
    .offset-lg-4 {
        margin-left: 33.33333%;
    }
    .offset-lg-5 {
        margin-left: 41.66667%;
    }
    .offset-lg-6 {
        margin-left: 50%;
    }
    .offset-lg-7 {
        margin-left: 58.33333%;
    }
    .offset-lg-8 {
        margin-left: 66.66667%;
    }
    .offset-lg-9 {
        margin-left: 75%;
    }
    .offset-lg-10 {
        margin-left: 83.33333%;
    }
    .offset-lg-11 {
        margin-left: 91.66667%;
    }
    }

    @media (min-width: 1200px) {
    .col-xl {
        flex-basis: 0;
        flex-grow: 1;
        max-width: 100%;
    }
    .col-xl-auto {
        flex: 0 0 auto;
        width: auto;
        max-width: 100%;
    }
    .col-xl-1 {
        flex: 0 0 8.33333%;
        max-width: 8.33333%;
    }
    .col-xl-2 {
        flex: 0 0 16.66667%;
        max-width: 16.66667%;
    }
    .col-xl-3 {
        flex: 0 0 25%;
        max-width: 25%;
    }
    .col-xl-4 {
        flex: 0 0 33.33333%;
        max-width: 33.33333%;
    }
    .col-xl-5 {
        flex: 0 0 41.66667%;
        max-width: 41.66667%;
    }
    .col-xl-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }
    .col-xl-7 {
        flex: 0 0 58.33333%;
        max-width: 58.33333%;
    }
    .col-xl-8 {
        flex: 0 0 66.66667%;
        max-width: 66.66667%;
    }
    .col-xl-9 {
        flex: 0 0 75%;
        max-width: 75%;
    }
    .col-xl-10 {
        flex: 0 0 83.33333%;
        max-width: 83.33333%;
    }
    .col-xl-11 {
        flex: 0 0 91.66667%;
        max-width: 91.66667%;
    }
    .col-xl-12 {
        flex: 0 0 100%;
        max-width: 100%;
    }
    .order-xl-first {
        order: -1;
    }
    .order-xl-last {
        order: 13;
    }
    .order-xl-0 {
        order: 0;
    }
    .order-xl-1 {
        order: 1;
    }
    .order-xl-2 {
        order: 2;
    }
    .order-xl-3 {
        order: 3;
    }
    .order-xl-4 {
        order: 4;
    }
    .order-xl-5 {
        order: 5;
    }
    .order-xl-6 {
        order: 6;
    }
    .order-xl-7 {
        order: 7;
    }
    .order-xl-8 {
        order: 8;
    }
    .order-xl-9 {
        order: 9;
    }
    .order-xl-10 {
        order: 10;
    }
    .order-xl-11 {
        order: 11;
    }
    .order-xl-12 {
        order: 12;
    }
    .offset-xl-0 {
        margin-left: 0;
    }
    .offset-xl-1 {
        margin-left: 8.33333%;
    }
    .offset-xl-2 {
        margin-left: 16.66667%;
    }
    .offset-xl-3 {
        margin-left: 25%;
    }
    .offset-xl-4 {
        margin-left: 33.33333%;
    }
    .offset-xl-5 {
        margin-left: 41.66667%;
    }
    .offset-xl-6 {
        margin-left: 50%;
    }
    .offset-xl-7 {
        margin-left: 58.33333%;
    }
    .offset-xl-8 {
        margin-left: 66.66667%;
    }
    .offset-xl-9 {
        margin-left: 75%;
    }
    .offset-xl-10 {
        margin-left: 83.33333%;
    }
    .offset-xl-11 {
        margin-left: 91.66667%;
    }
    }
    .page-body-wrapper {
        display: flex;
        flex-direction: row;
        padding-left: 0;
        padding-right: 0;
    }

    .page-body-wrapper.full-page-wrapper {
        width: 100%;
        min-height: 100vh;
        padding-top: 0;
    }

    .container-fluid {
        width: 100%;
        padding-right: 0rem;
        padding-left: 0rem;
        margin-right: auto;
        margin-left: auto;
    }

    .login-box {
        padding-top: 10vh;
        padding-bottom: 2rem;
    }
    .login-box-container {
        background: var(--white) 0% 0% no-repeat padding-box;
        background: #ffffff 0% 0% no-repeat padding-box;
        box-shadow: 0px 5px 17px #00000008;
        border-radius: 5px;
    }
    .top-loginbox {
        background: #d3f0fe 0% 0% no-repeat padding-box;
        border-radius: 5px 5px 0px 0px;
        display: flex;
        justify-content: space-between;
    }
    .top-loginbox-text {
        display: flex;
        flex-direction: column;
        color: #52c2fb;
        padding: 20px;
    }
    .top-loginbox-text h4 {
        font-weight: 700;
    }

    .main-panel {
        background: #F4F7FD;
        transition: all 0.25s ease, margin 0.25s ease;
        width: 100%;
        min-height: calc(100vh - 3.75rem);
        position: absolute;
        top: 3.75rem;
        right: 0;
        display: flex;
        flex-direction: column;
        padding-left: 270px;
    }

    @media (max-width: 1024px) {
        .main-panel {
            margin-left: 0;
            width: 100% !important;
            top: 3.75rem;
            right: 0;
            position: absolute;
            padding-left: 0 !important;
        }
    }

    .custom-main-panel {
        padding-left: 0px;
        top: 0px;
        position: unset;
    }

    .content-wrapper {
        padding: 1.25rem 1.875rem 0 1.875rem;
        width: 100%;
        flex-grow: 1;
    }

    @media (max-width: 767px) {
        .content-wrapper {
            padding: 0.9375rem 0.9375rem 0 0.9375rem;
        }
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -0.9375rem;
        margin-left: -0.9375rem;
    }

    .justify-content-center {
        justify-content: center !important;
    }

    .align-items-center, .navbar .navbar-menu-container .navbar-nav, .navbar .navbar-menu-container .navbar-nav .nav-item.nav-profile, .navbar .navbar-menu-container .navbar-nav .nav-item.dropdown .navbar-dropdown .dropdown-item, .task-list-wrapper ul li {
        align-items: center !important;
    }

    .mb-3,
    .my-3 {
        margin-bottom: 1rem !important;
    }

    .mb-4,
    .my-4 {
        margin-bottom: 1.5rem !important;
    }

    .text-danger {
        color: #F95062 !important;
    }

    .login-img {
        text-align: center;
    }

    .login-form-container {
        padding: 30px;
    }

    .login-form-container .form-control {
        background: #ffffff 0% 0% no-repeat padding-box;
        border: 1px solid #dfe2e6;
        border-radius: 3px;
    }

    .text-center {
        text-align: center !important;
    }

    .p-3 {
        padding: 1rem !important;
    }

    .text-muted {
        color: #888A8C !important;
    }


    </style>
</head>
<body>

    <div id="overlay" style="display:none;"><div class="spinner"></div><br/>Loading...</div>

    <!-- <div class="main-container"> -->
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="main-panel custom-main-panel">
                <div class="content-wrapper">
                    <section class="login-box row justify-content-center align-items-center">
                        <section class="col-12 col-sm-10 col-md-8 col-lg-6">
                            <div class="login-box-container">
                                <div class="top-loginbox">
                                    <div class="top-loginbox-text">
                                        <h4 class="mb-3 text-danger">Site Under Maintenance</h4>
                                    </div>
                                    <div> <img src="{{ asset('assets/images/login/login-img.png') }}" alt="login-img" /></div>
                                </div>
                                <div class="form-container login-form-container">
                                    <div class="login-img mb-4">
                                        <img src="{{ asset('assets/images/logo/login-logo.png') }}" alt="logo" />
                                    </div>
                                    <div class="text-center">
                                        <h4>Upgrading System Version.</h4>
                                        <h6 class="p-3 text-muted">We are having system upgrade and maintenance at the moment. Sorry for the inconvenience caused.</h6>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </section>
                </div>
            </div>
        </div>
    <!-- </div> -->

</body>
</html>
