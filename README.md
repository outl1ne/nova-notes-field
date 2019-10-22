# Nova Notes Field

This [Laravel Nova](https://nova.laravel.com) package adds a notes and activity field to Nova's arsenal of fields.

## Features

- Notes field on Detail view
- Differentiation between user-added and system-added notes
- Ability to add notes through the UI or programmatically
- Ability to delete user-made notes (w/ confirmation modal)
- Customizable placeholder support

## Screenshots

![Detail view](docs/detail.png)

## Installation

```bash
# Install the package via Composer
composer require optimistdigital/nova-notes-field

# Run automatically loaded migration(s)
php artisan migrate
```

## Usage

Add `HasNotes` trait to the model that has the notes:

```php
use OptimistDigital\NovaNotesField\Traits\HasNotes;

class ExampleModel extends Model
{
    use HasNotes;
}
```

Add `NotesField` to the matching resource:

```php
use OptimistDigital\NovaNotesField\NotesField;

class SomeResource extends Resource
{
  // ...

  public function fields(Request $request)
  {
    return [
      // ...
      NotesField::make('Notes')
        ->placeholder('Add note'), // Optional
    ]
  }
}
```

## Credits

- [Tarvo Reinpalu](https://github.com/Tarpsvo)

## License

This project is open-sourced software licensed under the [MIT license](LICENSE.md).
