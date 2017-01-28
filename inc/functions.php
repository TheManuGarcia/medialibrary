<?php
function get_item_html($id,$item) {
    $output =  "<li><a href='details.php?id="
        . $id . "'> <img src='"
        . $item["img"] . "' alt='"
        . $item["title"] . "' />"
        . "<p>View Details</p>"
        . "</a></li>";
    return $output;

}

function array_category($catalog,$category) {

    $output = array();
        foreach($catalog as $id => $item) {
            //    If the category is null we will return all the content
            if($category == null OR strtolower($category) == strtolower($item["category"])) { /*We use strtolower to change our string to lowercase */
//                If the category we passed in matches the category we are looping thru, we need to aff the $id to the output array
                $sort = $item["title"];
                $sort = ltrim($sort, "The "); /*Trims "The from the titles */
                $sort = ltrim($sort, "A ");
                $sort = ltrim($sort, "An ");
                $output[$id] = $sort;

            }
        }

    asort($output);
    return array_keys($output);


}