#### Symfony 4 rest api using FOSRESTBundle

Note:
I crated file 'config/packages/fos_rest.yaml' manually and
I added this line manually in 'config/bundles.php':
`FOS\RestBundle\FOSRestBundle::class => ['all' => true],`
Now when run this I get the right output:
`php bin/console debug:router`

output:
<pre>
  Name                       Method   Scheme   Host   Path                               
 -------------------------- -------- -------- ------ ----------------------------------- 
  app_healthcheck_get        GET      ANY      ANY    /ping                              
  _twig_error_test           ANY      ANY      ANY    /_error/{code}.{_format}           
  _wdt                       ANY      ANY      ANY    /_wdt/{token}                      
  _profiler_home             ANY      ANY      ANY    /_profiler/                        
  _profiler_search           ANY      ANY      ANY    /_profiler/search                  
  _profiler_search_bar       ANY      ANY      ANY    /_profiler/search_bar              
  _profiler_phpinfo          ANY      ANY      ANY    /_profiler/phpinfo                 
  _profiler_search_results   ANY      ANY      ANY    /_profiler/{token}/search/results  
  _profiler_open_file        ANY      ANY      ANY    /_profiler/open                    
  _profiler                  ANY      ANY      ANY    /_profiler/{token}                 
  _profiler_router           ANY      ANY      ANY    /_profiler/{token}/router          
  _profiler_exception        ANY      ANY      ANY    /_profiler/{token}/exception       
  _profiler_exception_css    ANY      ANY      ANY    /_profiler/{token}/exception.css   
  post_album                 POST     ANY      ANY    /album.{_format}                   
 -------------------------- -------- -------- ------ -----------------------------------
</pre>

then after run this command:
`php bin/console config:dump-reference FOSRestBundle`

and copy the whole output from it to 'config/packages/fos_rest.yaml' after creating it
Then comment all in 'fos_rest.yaml'
Then uncomment the appropriate lines to get the contents like this:

<pre>
fos_rest:
#  disable_csrf_role:    null
#  access_denied_listener:
#    enabled:              false
#    service:              null
#    formats:
#
#      # Prototype
#      name:                 ~
#  unauthorized_challenge: null
#  param_fetcher_listener:
#    enabled:              false
#    force:                false
#    service:              null
#  cache_dir:            '%kernel.cache_dir%/fos_rest'
#  allowed_methods_listener:
#    enabled:              false
#    service:              null
  routing_loader:
#    default_format:       null
#    prefix_methods:       true
    include_format:        false
#  body_converter:
#    enabled:              false
#    validate:             false
#    validation_errors_argument: validationErrors
#  service:
#    router:               router
#    templating:           templating
#    serializer:           null
#    view_handler:         fos_rest.view_handler.default
#    inflector:            fos_rest.inflector.doctrine
#    validator:            validator
#  serializer:
#    version:              null
#    groups:               []
#    serialize_null:       false
#  zone:
#
#  # Prototype
#  -
#
#    # use the urldecoded format
#    path:                 null # Example: ^/path to resource/
#    host:                 null
#    methods:              []
#    ips:                  []
#  view:
#    default_engine:       twig
#    force_redirects:
#
#      # Prototype
#      name:                 ~
#    mime_types:
#      enabled:              false
#      service:              null
#      formats:
#
#        # Prototype
#        name:                 []
#    formats:
#
#      # Prototype
#      name:                 ~
#    templating_formats:
#
#      # Prototype
#      name:                 ~
#    view_response_listener:
#      enabled:              false
#      force:                false
#      service:              null
#    failed_validation:    400
#    empty_content:        204
#    serialize_null:       false
#    jsonp_handler:
#      callback_param:       callback
#      mime_type:            application/javascript+jsonp
#  exception:
#    enabled:              false
#    exception_controller: null
#    service:              null
#    codes:
#
#      # Prototype
#      name:                 ~
#    messages:
#
#      # Prototype
#      name:                 ~
#    debug:                true
#  body_listener:
#    enabled:              true
#    service:              null
#    default_format:       null
#    throw_exception_on_unsupported_content_type: false
#    decoders:
#
#      # Prototype
#      name:                 ~
#    array_normalizer:
#      service:              null
#      forms:                false
#  format_listener:
#    enabled:              false
#    service:              null
#    rules:
#
#    # Prototype
#    -
#
#      # URL path info
#      path:                 null
#
#      # URL host name
#      host:                 null
#
#      # Method for URL
#      methods:              null
#      attributes:
#
#        # Prototype
#        name:                 ~
#      stop:                 false
#      prefer_extension:     true
#      fallback_format:      html
#      priorities:           []
#  versioning:
#    enabled:              false
#    default_version:      null
#    resolvers:
#      query:
#        enabled:              true
#        parameter_name:       version
#      custom_header:
#        enabled:              true
#        header_name:          X-Accept-Version
#      media_type:
#        enabled:              true
#        regex:                '/(v|version)=(?P<version>[0-9\.]+)/'
#    guessing_order:
#
#    # Defaults:
#    - query
#    - custom_header
#    - media_type

</pre>

Now when you run this again:
`php bin/console debug:router`

You will get output:
<pre>
  Name                       Method   Scheme   Host   Path                               
 -------------------------- -------- -------- ------ ----------------------------------- 
  app_healthcheck_get        GET      ANY      ANY    /ping                              
  _twig_error_test           ANY      ANY      ANY    /_error/{code}.{_format}           
  _wdt                       ANY      ANY      ANY    /_wdt/{token}                      
  _profiler_home             ANY      ANY      ANY    /_profiler/                        
  _profiler_search           ANY      ANY      ANY    /_profiler/search                  
  _profiler_search_bar       ANY      ANY      ANY    /_profiler/search_bar              
  _profiler_phpinfo          ANY      ANY      ANY    /_profiler/phpinfo                 
  _profiler_search_results   ANY      ANY      ANY    /_profiler/{token}/search/results  
  _profiler_open_file        ANY      ANY      ANY    /_profiler/open                    
  _profiler                  ANY      ANY      ANY    /_profiler/{token}                 
  _profiler_router           ANY      ANY      ANY    /_profiler/{token}/router          
  _profiler_exception        ANY      ANY      ANY    /_profiler/{token}/exception       
  _profiler_exception_css    ANY      ANY      ANY    /_profiler/{token}/exception.css   
  post_album                 POST     ANY      ANY    /album                             
 -------------------------- -------- -------- ------ ----------------------------------- 
</pre>

Note: '/album.{_format}' now is '/album'

