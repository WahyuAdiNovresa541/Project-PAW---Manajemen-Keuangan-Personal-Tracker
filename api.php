use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

Route::post('/login', function (Request $request) {
    $user = User::where('email',$request->email)->first();

    if (! $user || ! Hash::check($request->password,$user->password)) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    // MEMBUAT API KEY / TOKEN DI SINI
    $token =$user->createToken('frontend-api-key')->plainTextToken;

    return response()->json(['token' => $token]);
});

// Amankan route CRUD dengan middleware Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/posts', [PostController::class, 'store']);
});