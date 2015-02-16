# CakePHP-Autocomplete
Autocomplete plugin for CakePHP

<h2>Requirements</h2>

HTTP Server. For example: Apache.
PHP 5.2.8 or greater.
CakePHP 2.5.1+

<h2>Installation</h2>

- upload Config, Controller, View and webroot folder in the /app/Plugin/Autocomplete folder
- activate the plugin in /app/Config/bootstrap.php

CakePlugin::loadAll(array(
    'Autocomplete' => array('bootstrap' => true, 'routes' => true)
));

<h3>In the controller</h3>

public $helpers = array('Autocomplete.Autocomplete');

<h3>In the View</h3>

<?php echo $this->Autocomplete->initAutocomplete(); ?> 

for initializing

<?php
echo $this->Autocomplete->setAutocomplete(array(
	'element' => 'id_of_your_input_field',
	'url' => 'http://localhost',
	'model' => 'pages', 
	'field' => 'title', 
	'order' => 'ASC',
	'minLength' => 2
));
?>

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
