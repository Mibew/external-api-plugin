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
 * Process all API call related with threads.
 *
 * Notice that messages are processed with
 * {@link Mibew\Mibew\Plugin\ExternalApi\Controller\Message} controller.
 */
class ThreadController extends AbstractController
{
    public function getThreadCollectionAction(Request $request)
    {
        // The logic of threads loading and sending goes here. Also the threads
        // should be converted to a format which will be appropriate for client.
        $threads = array();

        // Some test data and serialize them.
        $threads[] = array(
            'id' => 1,
        );
        $threads[] = array(
            'id' => 2,
        );

        // Pass the threads to the client
        return new JsonResponse($threads);
    }

    public function getThreadAction(Request $request)
    {
        // Get ID of the requested thread...
        $id = $request->attributes->getInt('thread_id');
        // ...load requested thread from the database and serialize it.
        $thread = array(
            'id' => $id,
        );

        // Pass the thread to the client
        return new JsonResponse($thread);
    }

    public function updateThreadAction(Request $request)
    {
        // Get all thread's info from the request...
        $id = $request->attributes->getInt('thread_id');
        // ...and save it to the database

        // Pass the threads to the client
        return new JsonResponse(array(
            'id' => $id,
        ));
    }
}
