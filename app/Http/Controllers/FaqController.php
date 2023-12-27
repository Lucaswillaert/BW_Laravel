

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
{
    $faqs = Faq::where('published', true)->get();
    return view('faq.index', ['faqs' => $faqs]);
}
}
