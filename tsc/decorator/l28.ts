/**
 * Created by e on 1/9/17.
 */
@Component(
    {
        selector: 'my-app',
        template: "<h1>Welcome to {{name}} Decorators</h1>"
    }
)

export class AppComponent {
    public name: string = "Go"
}