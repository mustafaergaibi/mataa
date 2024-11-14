<?Php
namespace App\Http\Controllers;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use App\Models\Post;

class PostController extends Controller
{


    public function index()
    {
        // Load posts with their user relationships
        $posts = Post::with('user')->paginate(10);
        return view('dashboard', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id(), // Use Auth::id() to get the authenticated user's ID
            'published' => $request->has('published'),
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function edit(Post $post)
    {
        // Allow only a specific user to edit all posts
        if (Auth::user()->email !== 'mustafaalrgaiby444@gmail.com') {
            abort(403, 'Unauthorized action.');
        }

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // Allow only a specific user to update all posts
        if (Auth::user()->email !== 'mustafaalrgaiby444@gmail.com') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'published' => $request->has('published'),
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        // Allow only a specific user to delete all posts
        if (Auth::user()->email !== 'mustafaalrgaiby444@gmail.com') {
            abort(403, 'Unauthorized action.');
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
