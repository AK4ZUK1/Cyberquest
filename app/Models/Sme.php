namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sme extends Model
{
    use HasFactory;

    protected $table = 'smes';

    protected $fillable = [
        'name',
        'category',
        'description',
        'status', // e.g., 'Perlu Perhatian'
        'owner_name',
        'phone',
        'email',
        'address',
        'joined_date',
    ];
}