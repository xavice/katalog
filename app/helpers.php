<?php

function buildFilterLink($href, $content, $icon) {
    return '<a class="btn btn-light mb-1" href="' . $href . '">' . $content . ' <span class="material-icons align-middle">'. $icon . '</span></a>';
}
