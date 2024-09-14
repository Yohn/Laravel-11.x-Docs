#### `append($attributes)`

The `append` method may be used to indicate that an attribute should be [appended](/12.Laravel%2011.x%20Docs/08.Eloquent%20ORM/06.eloquent-serialization#appending-values-to-json) for every model in the collection. This method accepts an array of attributes or a single attribute:

```php
$users->append('team');

$users->append(['team', 'is_admin']);
```

<a name="method-contains"></a>
#### `contains($key, $operator = null, $value = null)`

The `contains` method may be used to determine if a given model instance is contained by the collection. This method accepts a primary key or a model instance:

```php
$users->contains(1);

$users->contains(User::find(1));
```

<a name="method-diff"></a>
#### `diff($items)`

The `diff` method returns all of the models that are not present in the given collection:

```php
use App\Models\User;

$users = $users->diff(User::whereIn('id', [1, 2, 3])->get());
```

<a name="method-except"></a>
#### `except($keys)`

The `except` method returns all of the models that do not have the given primary keys:

```php
$users = $users->except([1, 2, 3]);
```

<a name="method-find"></a>
#### `find($key)`

The `find` method returns the model that has a primary key matching the given key. If `$key` is a model instance, `find` will attempt to return a model matching the primary key. If `$key` is an array of keys, `find` will return all models which have a primary key in the given array:

```php
$users = User::all();

$user = $users->find(1);
```

<a name="method-fresh"></a>
#### `fresh($with = [])`

The `fresh` method retrieves a fresh instance of each model in the collection from the database. In addition, any specified relationships will be eager loaded:

```php
$users = $users->fresh();

$users = $users->fresh('comments');
```

<a name="method-intersect"></a>
#### `intersect($items)`

The `intersect` method returns all of the models that are also present in the given collection:

```php
use App\Models\User;

$users = $users->intersect(User::whereIn('id', [1, 2, 3])->get());
```

<a name="method-load"></a>
#### `load($relations)`

The `load` method eager loads the given relationships for all models in the collection:

```php
$users->load(['comments', 'posts']);

$users->load('comments.author');

$users->load(['comments', 'posts' => fn ($query) => $query->where('active', 1)]);
```

<a name="method-loadMissing"></a>
#### `loadMissing($relations)`

The `loadMissing` method eager loads the given relationships for all models in the collection if the relationships are not already loaded:

```php
$users->loadMissing(['comments', 'posts']);

$users->loadMissing('comments.author');

$users->loadMissing(['comments', 'posts' => fn ($query) => $query->where('active', 1)]);
```

<a name="method-modelKeys"></a>
#### `modelKeys()`

The `modelKeys` method returns the primary keys for all models in the collection:

```php
$users->modelKeys();

// [1, 2, 3, 4, 5]
```

<a name="method-makeVisible"></a>
#### `makeVisible($attributes)`

The `makeVisible` method [makes attributes visible](/12.Laravel%2011.x%20Docs/08.Eloquent%20ORM/06.eloquent-serialization#hiding-attributes-from-json) that are typically "hidden" on each model in the collection:

```php
$users = $users->makeVisible(['address', 'phone_number']);
```

<a name="method-makeHidden"></a>
#### `makeHidden($attributes)`

The `makeHidden` method [hides attributes](/12.Laravel%2011.x%20Docs/08.Eloquent%20ORM/06.eloquent-serialization#hiding-attributes-from-json) that are typically "visible" on each model in the collection:

```php
$users = $users->makeHidden(['address', 'phone_number']);
```

<a name="method-only"></a>
#### `only($keys)`

The `only` method returns all of the models that have the given primary keys:

```php
$users = $users->only([1, 2, 3]);
```

<a name="method-setVisible"></a>
#### `setVisible($attributes)`

The `setVisible` method [temporarily overrides](/12.Laravel%2011.x%20Docs/08.Eloquent%20ORM/06.eloquent-serialization#temporarily-modifying-attribute-visibility) all of the visible attributes on each model in the collection:

```php
$users = $users->setVisible(['id', 'name']);
```

<a name="method-setHidden"></a>
#### `setHidden($attributes)`

The `setHidden` method [temporarily overrides](/12.Laravel%2011.x%20Docs/08.Eloquent%20ORM/06.eloquent-serialization#temporarily-modifying-attribute-visibility) all of the hidden attributes on each model in the collection:

```php
$users = $users->setHidden(['email', 'password', 'remember_token']);
```

<a name="method-toquery"></a>
#### `toQuery()`

The `toQuery` method returns an Eloquent query builder instance containing a `whereIn` constraint on the collection model's primary keys:

```php
use App\Models\User;

$users = User::where('status', 'VIP')->get();

$users->toQuery()->update([
    'status' => 'Administrator',
]);
```

<a name="method-unique"></a>
#### `unique($key = null, $strict = false)`

The `unique` method returns all of the unique models in the collection. Any models with the same primary key as another model in the collection are removed:

```php
$users = $users->unique();
```
