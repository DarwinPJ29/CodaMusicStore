@extends('layout.website')
@section('website-main')
    @include('website.components.navbar')
    {{-- <data>
        <container class="container pt-5">
            <row class="row pt-5 d-flex justify-content-center">
                <container-sm class="container-sm border p-5 about">
                    <hr />
                    <mission>
                        <h1 class="text-label">Vision</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus odio esse, illum cupiditate
                            possimus architecto doloribus omnis est ullam unde. Sequi impedit velit numquam est quam
                            consectetur provident itaque expedita fugiat nulla temporibus consequuntur reprehenderit
                            tenetur, dolorem suscipit quod quisquam dolorum odit asperiores. Nisi debitis, nam iure eaque ad
                            repellat.</p>
                    </mission>
                    <vission>
                        <h1 class="text-label">Mission</h1>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam voluptate ad harum possimus
                            quas labore consequatur dolor, dolore non sed voluptas totam quod, molestias expedita
                            necessitatibus! Saepe nihil eveniet amet vitae dolorum voluptatum expedita sunt tenetur
                            perferendis! Omnis, quo unde optio quod quos suscipit aut doloribus numquam ipsum aliquam
                            dolorum.</p>
                    </vission>
                </container-sm>
            </row>
        </container>
    </data> --}}
    <?php
$data = [
    'container' => [
        '@attributes' => [
            'class' => 'container pt-5'
        ],
        'row' => [
            '@attributes' => [
                'class' => 'row pt-5 d-flex justify-content-center'
            ],
            'container-sm' => [
                '@attributes' => [
                    'class' => 'container-sm border p-5 about'
                ],
                'hr' => null,
                'sections' => [
                    [
                        'h1' => [
                            '@attributes' => [
                                'class' => 'text-label'
                            ],
                            '@value' => 'Vision'
                        ],
                        'p' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus odio esse, illum cupiditate possimus architecto doloribus omnis est ullam unde. Sequi impedit velit numquam est quam consectetur provident itaque expedita fugiat nulla temporibus consequuntur reprehenderit tenetur, dolorem suscipit quod quisquam dolorum odit asperiores. Nisi debitis, nam iure eaque ad repellat.'
                    ],
                    [
                        'h1' => [
                            '@attributes' => [
                                'class' => 'text-label'
                            ],
                            '@value' => 'Mission'
                        ],
                        'p' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam voluptate ad harum possimus quas labore consequatur dolor, dolore non sed voluptas totam quod, molestias expedita necessitatibus! Saepe nihil eveniet amet vitae dolorum voluptatum expedita sunt tenetur perferendis! Omnis, quo unde optio quod quos suscipit aut doloribus numquam ipsum aliquam dolorum.'
                    ]
                ]
            ]
        ]
    ]
];

function arrayToXml($data, &$xmlData) {
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            if ($key !== '@attributes') { // Skip processing @attributes key
                if (isset($value['@value'])) {
                    $subnode = $xmlData->addChild($key, htmlspecialchars($value['@value']));
                    if (isset($value['@attributes'])) {
                        foreach ($value['@attributes'] as $attrKey => $attrValue) {
                            $subnode->addAttribute($attrKey, $attrValue);
                        }
                    }
                } else {
                    $subnode = $xmlData->addChild($key);
                    if (isset($value['@attributes'])) {
                        foreach ($value['@attributes'] as $attrKey => $attrValue) {
                            $subnode->addAttribute($attrKey, $attrValue);
                        }
                    }
                    arrayToXml($value, $subnode);
                }
            }
        } else {
            $xmlData->addChild($key, htmlspecialchars($value));
        }
    }
}

$xmlData = new SimpleXMLElement('<?xml version="1.0"?><data></data>');
    arrayToXml($data, $xmlData);

    // Output the XML without numeric keys
    $xmlOutput = $xmlData->asXML();
    $xmlOutput = preg_replace('/<\d+>/', '', $xmlOutput);

        header('Content-Type: application/xml');
        echo $xmlOutput;
        ?>


        @include('website.components.footer')
    @endsection
