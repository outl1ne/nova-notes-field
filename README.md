# Nova Notes Field

This [Laravel Nova](https://nova.laravel.com) package adds a notes field to Nova's arsenal of fields.

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

## Adding notes programmatically

To add notes programmatically, use the method provided by the `HasNotes` trait:

```php
/**
 * Creates a new note and attaches it to the model.
 *
 * @param string $note The note text which can contain raw HTML.
 * @param bool $user Enables or disables the use of `Auth::user()` to set as the creator.
 * @param bool $system Defines whether the note is system created and can be deleted or not.
 * @return \OptimistDigital\NovaNotesField\Models\Note
 **/
public function addNote($note, $user = true, $system = true)
```

## Configuration

### Publish configuration

You can publish the configuration by running:

```bash
php artisan vendor:publish --tag="nova-notes-field-config"
```

The available configuration option(s):

| Config         | Type     | description                                                                                                                                                  |
| -------------- | -------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| get_avatar_url | callable | Callable which allows you to generate your own URL for the user. The input parameter is the user model. By default, Gravatar is used for the user's avatars. |

## Credits

- [Tarvo Reinpalu](https://github.com/Tarpsvo)

## License

This project is open-sourced software licensed under the [MIT license](LICENSE.md).
