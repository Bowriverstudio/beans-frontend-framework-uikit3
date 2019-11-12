<?php
/**
 * Utility Functions.
 */

/**
 * Reduces the number of columns and grid to the lowest term.
 *
 * .uk-child-width-1-2	All elements take up half of their parent container.
 * .uk-child-width-1-3	All elements take up a third of their parent container.
 * .uk-child-width-1-4	All elements take up a fourth of their parent container.
 * .uk-child-width-1-5	All elements take up a fifth of their parent container.
 * .uk-child-width-1-6	All elements take up a sixth of their parent container.
 *
 * @param string $numberOfColumns_grid
 * @return string.
 */
function beans_get_uikit_reduced_grid(string $numberOfColumns_grid)
{
    $return  = $numberOfColumns_grid;
    switch ($numberOfColumns_grid){
        case '2-4':
        case '3-6':
            $return = '1-2';
            break;

        case '2-6':
            $return = '1-3';
            break;

        case '4-6':
            $return = '2-3';
            break;
    }

    return $return;

}
