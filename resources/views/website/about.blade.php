@extends('layout.website')
@section('website-main')
    @include('website.components.navbar')
    {{-- <data>
        <container class="container pt-5">
            <row class="row pt-5 d-flex justify-content-center">
                <container-sm class="container-sm border p-4 about">
                    <hr />
                    <mission>
                        <h4 class="text-labelVision">About</h4>
                        <p class="p1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus odio esse, illum cupiditate
                            possimus architecto doloribus omnis est ullam unde. Sequi impedit velit numquam est quam
                            consectetur provident itaque expedita fugiat nulla temporibus consequuntur reprehenderit
                            tenetur, dolorem suscipit quod quisquam dolorum odit asperiores. Nisi debitis, nam iure eaque ad
                            repellat.</p>
                        <p class="p2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. In at ipsam natus quos enim laboriosam, nisi, temporibus recusandae obcaecati perferendis omnis animi et quidem neque tempore nulla hic aliquid ex.</p><br>
                        <p class="p3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim, est illo cum distinctio, totam ea natus consectetur animi architecto recusandae similique labore esse voluptate mollitia! Id neque fuga placeat asperiores.</p>

                    </mission>
                    <vission>
                        <h5 class="text-label">Viva la musica!</h5>
                        <!-- <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam voluptate ad harum possimus
                            quas labore consequatur dolor, dolore non sed voluptas totam quod, molestias expedita
                            necessitatibus! Saepe nihil eveniet amet vitae dolorum voluptatum expedita sunt tenetur
                            perferendis! Omnis, quo unde optio quod quos suscipit aut doloribus numquam ipsum aliquam
                            dolorum.</p> -->
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
                        'h4' => [
                            '@attributes' => [
                                'class' => 'text-label'
                            ],
                            '@value' => 'Vision'
                        ],
                        'p1' => 'Welcome to CODA, your premier Online Music Store based in the Philippines. At CODA, we believe in the pursuit of perfection, 
                        inspiring us never to compromise on quality. Our mission is to provide high-quality, original instruments at affordable prices.',
                        
                        'p2' => 'The house of CODA Music Store offers a wide range of instruments including guitars, Strings, Cables, Amplifiers, and more.',
                        
                        'p3' => 'Our goal is to become the ultimate online musical instrument shop in the Philippines, offering the best instruments to every
                        music enthusiast in the nation. So, what are you waiting for? Embark on your musical journey with authentic instruments from CODA and
                        unleash your passion for music.'                        
                   
                    ],
                    [
                        'h5' => [
                            '@attributes' => [
                                'class' => 'text-label'
                            ],
                            '@value' => 'Viva la musica!'
                        ],
                        // 'p' => '"To provide an innovative, user-friendly platform that simplifies the buying and selling of musical instruments and accessories for the Bulacan State University community, fostering a vibrant musical culture and supporting local talent."'
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
