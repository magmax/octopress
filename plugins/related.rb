#!/usr/bin/ruby
# -*- coding:utf-8; tab-width:4; mode:ruby -*-

module Jekyll
  class RelatedGenerator < Generator

    safe true
    priority :high

    def generate(site)
      site.posts.map! do |post|
        related = [ ]
        unless post.tags.empty?
          related += site.tags.map { |k,v|
            v if post.tags.include?(k) }.flatten.uniq.reject { |x|
            x.nil? || x.url == post.url }.sort.reverse
        end
        if post.data['related'] != related
          post.data['related'] = related
        end
        post
      end
    end

  end
end
