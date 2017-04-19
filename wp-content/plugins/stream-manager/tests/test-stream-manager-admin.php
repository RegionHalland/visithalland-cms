<?php

	class TestStreamManagerAdmin extends StreamManager_UnitTestCase {
		
		function testAdminGetInstance() {
			$admin = StreamManagerAdmin::get_instance();
			$this->assertObjectHasAttribute('plugin', $admin);
			$this->assertObjectHasAttribute('default_query', $admin);
		}

		function testSaveStream() {
			$admin = StreamManagerAdmin::get_instance();
			$stream = $this->buildStream();
			$postids = $this->buildPosts(5);		
			foreach($postids as $id) {
				$_POST['sm_sort'][] = $id;
			}
			$admin->save_stream($stream->ID, false);
			$stream = new TimberStream($stream->ID);
			$this->assertEquals(5, count($stream->options['stream']));
		}

		function testAddHelpText() {
			set_current_screen( 'sm_stream' );
			$admin = StreamManagerAdmin::get_instance();
			$admin->add_help_text();
			$screen = get_current_screen();
			$tabs = $screen->get_help_tabs();
			$this->assertEquals(3, count($tabs));
		}

		function testDefinePostTypes() {
			$manager = StreamManager::get_instance();
			$manager->define_post_types();
			$post_types = get_post_types();
			$this->assertTrue(in_array($manager->get_post_type_slug(), $post_types));
		}

	}
