<?php
include("inc/data.php");
include("inc/functions.php");


if(isset($_GET["id"])) {
   $id = $_GET["id"];

//    Check for that id within out catalog
    if(isset($catalog[$id])) {
        $item = $catalog[$id];
    }
}

/*If we don't find an item or we aren't passing a variable, then our item variable will not be set and
we will redirect them to our full catalog */

if(!isset($item)) {

//   header is a http function

    header("location:catalog.php");
    exit;
}

$pageTitle = $item ["title"];
$section = null;

include("inc/header.php"); ?>



<!--Insert image -->
<div class="section page">
     <div class="wrapper">
         <div class="breadcrumbs">
             <a href="catalog.php">Full Catalog</a>
             &gt;
             <a href="catalog.php?cat=<?php echo strtolower($item["category"]); ?> "> <!-- Link to our category -->
             <?php echo $item["category"]; ?>
             </a>
             &gt; <?php echo $item["title"]; ?>

         </div>
         <div class="media-picture">
         <span>
            <img src="<?php echo $item["img"]; ?>" alt="<?php echo $item["title"]; ?>" />
         </span>
         </div>

    <div class="media-details">
        <h1><?php echo $item["title"]; ?></h1>
        <table>
            <tr>
                <th>Category</th>
                <td><?php echo $item["category"]; ?></td>
            </tr>

            <tr>
                <th>Genre</th>
                <td><?php echo $item["genre"]; ?></td>
            </tr>

            <tr>
                <th>Format</th>
                <td><?php echo $item["format"]; ?></td>
            </tr>

            <tr>
                <th>Year</th>
                <td><?php echo $item["year"]; ?></td>
            </tr>
<!--            Make our categories match-->
            <?php if(strtolower($item["category"]) == "books") { ?>

                <tr>
                    <th>Authors</th>
<!--                    Implode joins the array pieces into a string-->
                    <td><?php echo implode(", ",$item["authors"]); ?></td>
                </tr>

                <tr>
                    <th>Publisher</th>
                    <td><?php echo $item["publisher"]; ?></td>
                </tr>

                <tr>
                    <th>ISBN</th>
                    <td><?php echo $item["isbn"]; ?></td>
                </tr>
            <?php } else if(strtolower($item["category"]) == "movies") { ?>

                <tr>
                    <th>Director</th>
                    <td><?php echo $item["director"]; ?></td>
                </tr>

                <tr>
                    <th>Writers</th>
                    <td><?php echo implode(", ", $item["writers"]); ?></td>
                </tr>

                <tr>
                    <th>Stars</th>
                    <td><?php echo implode(", ", $item["stars"]); ?></td>
                </tr>
                <?php } else if (strtolower($item["category"]) == "music") { ?>
                <tr>
                    <th>Artist</th>
                    <td><?php echo $item["artist"]; ?></td>
                </tr>

            <?php } ?>



        </table>

        </div>

    </div>
</div>


<?php include("inc/footer.php"); ?>