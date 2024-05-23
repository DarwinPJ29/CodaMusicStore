@extends('layout.website')
@section('website-main')
    @include('website.components.navbar')

    <?php
    $data = [
        'container1' => [
            '@attributes' => [
                'class' => 'container pt-5'
            ],
            'row' => [
                '@attributes' => [
                    'class' => 'row pt-5 d-flex justify-content-center'
                ],
                'container-sm2' => [
                    '@attributes' => [
                        'class' => 'container-sm2 border p-5 about'
                    ],
                    'hr' => null,
                    'sections' => [
                        [
                            'h4' => [
                                '@attributes' => [
                                    'class' => 'text-label'
                                ],
                                '@value' => 'Get in Touch'
                            ],
                            'p4' => 'Renz Russel Batongbakal & Daniel Gideon Santos'
                        ],
                        [
                            'h6' => [
                                '@attributes' => [
                                    'class' => 'text-label'
                                ],
                                '@value' => 'Email us at:'
                            ],
                            'p4' => 'Codamusicstore@gmail.com'
                        ]
                    ]
                ]
            ]
        ]
    ];
 // Function to convert PHP array to XML
 function arrayToXml($data, &$xmlData) {
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            if ($key !== '@attributes') {
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

    // XQuery to select specific elements
    $xpathQuery = '/data/container/row/container-sm/sections/h1';

    // Perform XQuery
    $results = $xmlData->xpath($xpathQuery);

    // Output the XML without numeric keys
    $xmlOutput = $xmlData->asXML();
    $xmlOutput = preg_replace('/<\d+>/', '', $xmlOutput);
    echo $xmlOutput;

    // Process and output the results
    foreach ($results as $result) {
        echo $result;
    }
    ?>

    @include('website.components.footer')
@endsection
