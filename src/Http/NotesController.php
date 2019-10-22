<?php

namespace OptimistDigital\NovaNotesField\Http;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use OptimistDigital\ZaveEcommerce\Models\Order;

class NotesController extends Controller
{
    // GET /notes
    public function getNotes(Request $request, $orderId)
    {
        $resourceId = $request->get('resourceId');
        $resourceName = $request->get('resourceName');

        return response('', 204);
    }

    // POST /notes
    public function addNote(Request $request, $orderId)
    {
        $resourceId = $request->get('resourceId');
        $resourceName = $request->get('resourceName');

        return response('', 204);
    }
}
