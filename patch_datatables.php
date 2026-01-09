<?php
$files = [
    'c:\laragon\www\GarudaCBT\application\controllers\Dataguru.php' => [
        'search' => 'public function output_json($data, $encode = true) { goto oNICG; oNICG: if (!$encode) { goto Z2vwK; } goto QdLnU; QdLnU: $data = json_encode($data); goto lsFkX; lsFkX: Z2vwK: goto SiSbh; SiSbh: $this->output->set_content_type("\141\160\160\154\x69\x63\x61\x74\x69\157\156\57\152\x73\157\x6e")->set_output($data); goto IsEBM; IsEBM: }',
        'replace' => 'public function output_json($data, $encode = true) { if ($encode) $data = json_encode($data); if (ob_get_length()) ob_clean(); $this->output->set_content_type(\'application/json\')->set_output($data); }'
    ],
    'c:\laragon\www\GarudaCBT\application\controllers\Dataekstra.php' => [
        'search' => 'public function output_json($data, $encode = true) { goto ZGjXC; ZGjXC: if (!$encode) { goto GoIug; } goto rQFNL; NyzSX: $this->output->set_content_type("\141\160\160\154\x69\x63\x61\x74\x69\157\156\57\152\163\157\156")->set_output($data); goto ur0xl; SRdHe: GoIug: goto NyzSX; rQFNL: $data = json_encode($data); goto SRdHe; ur0xl: }',
        'replace' => 'public function output_json($data, $encode = true) { if ($encode) $data = json_encode($data); if (ob_get_length()) ob_clean(); $this->output->set_content_type(\'application/json\')->set_output($data); }'
    ]
];

foreach ($files as $file => $data) {
    if (file_exists($file)) {
        $content = file_get_contents($file);
        if (strpos($content, $data['search']) !== false) {
            $new_content = str_replace($data['search'], $data['replace'], $content);
            file_put_contents($file, $new_content);
            echo "Patched " . basename($file) . " successfully.\n";
        } else {
            echo "Search string not found in " . basename($file) . ".\n";
        }
    } else {
        echo "File " . basename($file) . " not found.\n";
    }
}
?>
