<?php
/*
 * This file is a part of Mibew External API Plugin.
 *
 * Copyright 2015 Dmitriy Simushev <simushevds@gmail.com>.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Mibew\Mibew\Plugin\ExternalApi\Controller;

use Mibew\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Process all API calls related with thread's messages.
 */
class MessageController extends AbstractController
{
    public function getMessageCollectionAction(Request $request)
    {
        // Get the ID of the requested thread.
        $thread_id = $request->attributes->getInt('thread_id');
        // Check if only subset of messages should be loaded.
        $since = $request->query->getInt('since', 0);

        // Load all messages related with the requested thread whose IDs are
        // greater than the specified one and serialize them.
        $messages = array();

        for ($i = 1; $i < 4; $i++) {
            $messages[] = array(
                'threadId' => $thread_id,
                'id' => $since + $i,
            );
        }

        return new JsonResponse($messages);
    }

    public function postMessageAction(Request $request)
    {
        // Get the ID of the thread the message should be posted to.
        $thread_id = $request->attributes->getInt('thread_id');

        // Save the message...
        // ...and send the ID of the created message to the client.

        return new JsonResponse(array(
            'id' => 29,
        ), 201);
    }
}
