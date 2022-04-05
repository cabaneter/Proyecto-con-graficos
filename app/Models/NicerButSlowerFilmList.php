<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class NicerButSlowerFilmList
 * 
 * @property int|null $FID
 * @property string|null $title
 * @property string|null $description
 * @property string $category
 * @property float|null $price
 * @property int|null $length
 * @property string|null $rating
 * @property string|null $actors
 *
 * @package App\Models
 */
class NicerButSlowerFilmList extends Model
{
	protected $table = 'nicer_but_slower_film_list';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'FID' => 'int',
		'price' => 'float',
		'length' => 'int'
	];

	protected $fillable = [
		'FID',
		'title',
		'description',
		'category',
		'price',
		'length',
		'rating',
		'actors'
	];
}
