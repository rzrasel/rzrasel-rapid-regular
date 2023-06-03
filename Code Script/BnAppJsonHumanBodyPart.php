<?php
$humanBodyPart = new HumanBodyPart();

$bodyPart = $humanBodyPart->dashboardMenu();
echo "\n";
echo "\n";
echo $bodyPart;
echo "\n";
echo "\n";
?>
<?php
class HumanBodyPart {
    private $jsonArray = array();
    function dashboardMenu() {
        $this->onLoadDashboardMenu();
        return json_encode($this->jsonArray);
    }
    private function onLoadDashboardMenu() {
        $jsonData = array();
        //
        //
        $bengali = "কান";
        $english = "Ear";
        $jsonData[] = $this->onDashboardMenu(
            $bengali,
            $english,
            "human_body_parts",
            "image.png",
            "audio.mp3",
        );
        $bengali = "কানের পর্দা";
        $english = "Ear-drum";
        $jsonData[] = $this->onDashboardMenu(
            $bengali,
            $english,
            "human_body_parts",
            "image.png",
            "audio.mp3",
        );
        $bengali = "ভ্রু";
        $english = "Eyebrow";
        $jsonData[] = $this->onDashboardMenu(
            $bengali,
            $english,
            "human_body_parts",
            "image.png",
            "audio.mp3",
        );
        $bengali = "চোখের পাতা";
        $english = "Eyelid";
        $jsonData[] = $this->onDashboardMenu(
            $bengali,
            $english,
            "human_body_parts",
            "image.png",
            "audio.mp3",
        );
        $bengali = "চোখের পাপড়ি";
        $english = "Eyelash";
        $jsonData[] = $this->onDashboardMenu(
            $bengali,
            $english,
            "human_body_parts",
            "image.png",
            "audio.mp3",
        );
        $bengali = "চোখ";
        $english = "Eye";
        $jsonData[] = $this->onDashboardMenu(
            $bengali,
            $english,
            "human_body_parts",
            "image.png",
            "audio.mp3",
        );
        $bengali = "চোখের পুতলি / চোখের তারা";
        $english = "Pupil";
        $jsonData[] = $this->onDashboardMenu(
            $bengali,
            $english,
            "human_body_parts",
            "image.png",
            "audio.mp3",
        );
        $bengali = "নাক";
        $english = "Nose";
        $jsonData[] = $this->onDashboardMenu(
            $bengali,
            $english,
            "human_body_parts",
            "image.png",
            "audio.mp3",
        );
        //
        //
        echo "\n";
        echo count($jsonData);
        echo "\n";
        echo "\n";
        //
        //
        $this->jsonArray = array(
            array(
                "meta_id" => "meta_id",
                "data" => $jsonData,
            ),
        );
    }
    private function onDashboardMenu(
        $bengali,
        $english,
        $slug,
        $imageFile,
        $audioFile
    ) {
        $imageDir = "images/menu/";
        $audioDir = "audio/menu/";
        return array(
            "bengali_pronunciation" => $bengali,
            "english_pronunciation" => $english,
            "slug" => $slug,
            "image_file" => $imageDir . $imageFile,
            "audio_file" => $audioDir . $imageFile,
        );
    }
    private function onMetaInformation() {
        return array(
            "meta_id" => "meta_id",
            "title" => $title,
            "description" => $description,
            "slug" => $slug,
        );
    }
}
?>