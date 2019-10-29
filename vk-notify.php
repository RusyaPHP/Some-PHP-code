$request_params = array(
                'message' => "message",
                'user_id' => 'user_id',
                'random_id' => '',
                'access_token' => 'token',
                'v' => '5.92'
            );

            $get_params = http_build_query($request_params);

            file_get_contents('https://api.vk.com/method/messages.send?' . $get_params);
