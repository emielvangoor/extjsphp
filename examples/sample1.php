<?php

require __DIR__ . '/../vendor/autoload.php';

use Bonsa\Extphp\Layout\Container\Hbox;
use Bonsa\Extphp\Panel\Panel;
use Bonsa\Extphp\Resizer\Splitter;

$lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque dignissim ipsum id diam dapibus tristique. Quisque porta nulla aliquam leo porttitor aliquam. Suspendisse placerat pulvinar euismod. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi non orci blandit, eleifend elit interdum, convallis sem. Nam iaculis scelerisque erat, id luctus tortor efficitur nec. Sed sit amet ornare nulla. Morbi aliquet tristique risus, at sollicitudin erat commodo ut. Proin ac odio eget purus imperdiet ultrices et id magna. Proin in enim eget libero ornare maximus. Nunc congue magna vitae iaculis molestie. Duis molestie felis eget nulla semper, vel pulvinar turpis imperdiet. Nullam pellentesque, elit id pellentesque tempus, magna felis scelerisque nunc, non volutpat tellus dolor vitae odio. Maecenas efficitur metus erat, ut convallis felis lobortis id. Donec tristique blandit sapien, ut aliquam nunc imperdiet vitae. Pellentesque pulvinar odio nec consectetur mattis. Etiam lorem justo, consectetur vitae ipsum vitae, dapibus luctus purus. Aliquam et dui nec quam sagittis vehicula sed in magna. Curabitur interdum tellus in massa dictum, ut venenatis elit posuere. Donec ultrices posuere nulla eget consectetur. Praesent ac commodo diam, id rutrum orci. Phasellus vitae tortor nec nulla gravida luctus. Phasellus blandit nibh ac mi eleifend, ut ullamcorper felis vulputate. Praesent in pellentesque lectus, at aliquam felis. Etiam risus urna, tempus quis nulla quis, vulputate condimentum felis. Nulla et arcu sit amet lacus egestas placerat. Nunc a ultricies elit. Sed dapibus ipsum eu felis commodo, quis congue dolor sollicitudin. Suspendisse elementum molestie molestie. Nunc tempus tristique leo, sit amet egestas ante volutpat id. Praesent ut nulla commodo, consequat orci vitae, tincidunt augue. Sed vitae odio convallis, dapibus ipsum eu, hendrerit mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum nulla dui, accumsan vitae purus eu, gravida ultrices diam. Sed eget nisi vestibulum, vehicula diam et, congue nulla. Nulla ex magna, varius eget sem vel, maximus vulputate velit. Phasellus tincidunt mattis faucibus. Nunc at tellus sit amet magna faucibus tempus vitae a nisl. Sed augue urna, commodo vitae molestie nec, viverra sed ligula. Etiam pulvinar vestibulum neque in tempor. Aenean pretium nisi nunc. Mauris scelerisque hendrerit mauris, at egestas lacus viverra at. Nulla cursus urna in diam vulputate, non malesuada nisl ultricies. Ut accumsan et nulla ut ultrices. Suspendisse bibendum porta aliquet. Vivamus lobortis semper ex ac aliquam. Integer at feugiat purus. Sed commodo id mi in euismod. Vivamus sed lacus nec nibh elementum mattis id quis sapien. Vivamus finibus scelerisque arcu nec iaculis. Nulla rutrum feugiat ultrices. Quisque suscipit lectus quis luctus faucibus. Mauris luctus ornare purus, sit amet faucibus tortor placerat at. Morbi accumsan est et tortor convallis, et ultricies enim pretium. In maximus accumsan libero, vel efficitur ex varius vitae. Curabitur a dui ac quam imperdiet molestie. Phasellus et turpis consequat, efficitur quam ornare, egestas leo. Mauris non urna eu nulla blandit consectetur. Interdum et malesuada fames ac ante ipsum primis in faucibus.";

echo json_encode(
    new Panel([
        'layout' => (new Hbox)->setAlign(Hbox::ALIGN_STRETCH),
        'items' => [
            new Panel([
                'title' => 'Navigation',
                'flex' => 1,
                'collapseDirection' => Panel::COLLAPSE_DIRECTION_LEFT
            ]),
            new Splitter,
            new Panel([
                'title' => 'Content',
                'flex' => 3,
                'html' => $lorem,
                'scrollable' => Panel::SCROLL_AUTO,
            ]),
        ]
    ])
);
