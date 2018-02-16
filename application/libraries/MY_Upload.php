<?php 
	class MY_Upload extends CI_Upload{
		private $size;
		private $types;
		private $height;
		private $width;
		private $path;
		private $config;

		public function getSize()
		{
			return $this->size;
		}
		public function setSize($size)
		{
			$this->size = $size;
		}
		public function getTypes()
		{
			return $this->types;
		}
		public function setTypes($types)
		{
			$this->types = $types;
		}
		public function getHeight()
		{
			return $this->height;
		}
		public function setHeight($height)
		{
			$this->height = $height;
		}
		public function getWidth()
		{
			return $this->width;
		}
		public function setWidth($width)
		{
			$this->width = $width;
		}
		public function getPath()
		{
			return $this->path;
		}
		public function setPath($path)
		{
			$this->path = $path;
		}

		public function setConfigurationUpload()
		{
			$this->config['allowed_types'] = $this->getTypes();
			$this->config['max_size'] = $this->getSize();
			$this->config['max_height'] = $this->getHeight();
			$this->config['max_width'] = $this->getWidth();
			$this->config['upload_path'] = $this->getPath();

			return $this->config;
		}
	}