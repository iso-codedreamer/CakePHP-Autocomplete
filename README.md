# CakePHP-Autocomplete
Autocomplete plugin for CakePHP
Updated for CakePHP 3

<h2>Requirements</h2>

HTTP Server. For example: Apache.
PHP 5.2.8 or greater.
CakePHP 3+

<h2>Dependencies</h2>

jQuery UI Autocomplete

<h2>Installation</h2>

- upload config & src folders in the /app/Plugin/Autocomplete folder
- upload webroot folder in /app/webroot/
- activate the plugin in /app/Application.php
`$this->addPlugin('Autocomplete',  array('bootstrap' => true, 'routes' => true));`


<h3>In the controller</h3>

`public $helpers = array('Autocomplete.Autocomplete');`

<h3>In the View</h3>

`echo $this->Autocomplete->initAutocomplete();` for initializing

```
<?php
$autocompleteScript = $this->Autocomplete->setAutocomplete(array(
    'element' => 'parishionerName',
    'url' => Router::url('/autocomplete', true),
    'model' => 'Parishioners',
    'field' => 'name',
    'order' => 'ASC',
    'minLength' => 2
));
?>
<script>
	//only execute after finishing DOM loading so that external dependencies i.e jQuery and jQuery autocomplete are loaded
	document.addEventListener("DOMContentLoaded", function(event) {
        <?php echo $autocompleteScript; ?>
    });
</script>
```
to set the parameters. 

<h2>License</h2>

MIT LICENSE

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
