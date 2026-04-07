<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display list of articles with search and pagination (optimized - no N+1)
     */
    public function index(Request $request)
    {
        // Get search query
        $search = $request->input('search');
        $category = $request->input('category');

        // Build optimized query with eager loading to prevent N+1
        $query = Article::published()
            ->with(['teacher:id,name,email']) // Eager load teacher to prevent N+1
            ->select(['id', 'title', 'slug', 'excerpt', 'category', 'image', 'teacher_id', 'published_at', 'views'])
            ->orderBy('published_at', 'desc');

        // Apply search filter if provided
        if ($search) {
            $query->search($search);
        }

        // Apply category filter if provided
        if ($category) {
            $query->where('category', $category);
        }

        // Paginate results (15 per page)
        $articles = $query->paginate(15);

        // Get unique categories for filter dropdown
        $categories = Article::published()
            ->select('category')
            ->distinct()
            ->whereNotNull('category')
            ->pluck('category')
            ->sort();

        return view('articles.index', [
            'articles' => $articles,
            'categories' => $categories,
            'search' => $search,
            'category' => $category,
        ]);
    }

    /**
     * Display a single article with related articles and comments
     */
    public function show(Article $article)
    {
        // Get published article only
        if (!$article->published) {
            abort(404);
        }

        // Increment views count
        $article->incrementViews();

        // Get related articles (same category, excluding current article)
        $relatedArticles = Article::published()
            ->where('category', $article->category)
            ->where('id', '!=', $article->id)
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();

        // Get all comments for this article
        $comments = $article->comments()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('articles.show', [
            'article' => $article,
            'relatedArticles' => $relatedArticles,
            'comments' => $comments,
        ]);
    }

    /**
     * Store a new comment for an article
     */
    public function storeComment(Request $request, Article $article)
    {
        // Validate comment input
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'content' => ['required', 'string', 'min:3', 'max:1000'],
        ]);

        // Create the comment
        $article->comments()->create($validated);

        return back()
            ->with('success', 'Komentar Anda telah ditambahkan dan sedang menunggu persetujuan.');
    }
}
