<?php

namespace galbert\cwhelpers;

class CWQuote{

    public static function get(){
        $quotes = [
            'The best preparation for tomorrow is doing your best today. - H. Jackson Brown, Jr.',
            'All our dreams can come true, if we have the courage to pursue them. - Walt Disney',
            'It does not matter how slowly you go as long as you do not stop. - Confucius',
            'Everything you’ve ever wanted is on the other side of fear. - George Addair',
            'Hardships often prepare ordinary people for an extraordinary destiny. - C.S. Lewis',
            'Things work out best for those who make the best of how things work out. - John Wooden',
            'Good, better, best. Never let it rest - Dr. Martin Luther King Jr.',
            'A person who never made a mistake never tried anything new. - Albert Einstein',
            'The mind is everything. What you think you become. - Buddha',
            'The best time to plant a tree was 20 years ago. The second best time is now. - Chinese Proverb',
            'The only way to do great work is to love what you do. - Steve Jobs',
            'If you can dream it, you can achieve it. - Zig Ziglar',
            'The best way to predict your future is to create it. - Abraham Lincoln',
            'The best revenge is massive success. - Frank Sinatra',

        ];
        $size = sizeof($quotes);
        $index = rand(0, $size - 1);
        return $quotes[$index];
    }

}
