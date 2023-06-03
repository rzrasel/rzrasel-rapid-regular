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
        $this->jsonArray[] = $this->onDashboardMenu(
            "En-Human-Body-Parts-For-Kids.png",
            "Human Body Parts",
            "Description Label 1",
            "human_body_parts"
        );
        $this->jsonArray[] = $this->onDashboardMenu(
            "Human-Body-Parts-For-Kids.png",
            "Title Label 2",
            "Description Label 2",
            "test_top_1"
        );
        $this->jsonArray[] = $this->onDashboardMenu(
            "Human-Body-Parts-For-Kids.png",
            "Title Label 3",
            "Description Label 3",
            "test_top_1"
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