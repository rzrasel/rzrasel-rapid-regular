<?php
$jsonGenerator = new AppJsonGenerator();

$dashboardMenu = $jsonGenerator->dashboardMenu();
echo $dashboardMenu;
?>
<?php
class AppJsonGenerator {
    private $jsonArray = array();
    function dashboardMenu() {
        $this->onLoadDashboardMenu();
        return json_encode($this->jsonArray);
    }
    private function onLoadDashboardMenu() {
        $title = "মানব দেহের বিভিন্ন অঙ্গের নাম";
        $description = "মানবদেহ সম্পর্কে সাধারণ জ্ঞান।";
        $this->jsonArray[] = $this->onDashboardMenu(
            "Bn-Human-Body-Parts-For-Kids.png",
            $title,
            $description,
            "human_body_parts"
        );
        $this->jsonArray[] = $this->onDashboardMenu(
            "Bn-Human-Body-Parts-For-Kids.png",
            "Title Label 2",
            "Description Label 2",
            "test_top_2"
        );
        $this->jsonArray[] = $this->onDashboardMenu(
            "Bn-Human-Body-Parts-For-Kids.png",
            "Title Label 3",
            "Description Label 3",
            "test_top_3"
        );
    }
    private function onDashboardMenu(
        $imageFile,
        $title,
        $description,
        $slug
    ) {
        $imageDir = "images/menu/";
        return array(
            "image_file" => $imageDir . $imageFile,
            "title" => $title,
            "description" => $description,
            "slug" => $slug,
        );
    }
}
?>