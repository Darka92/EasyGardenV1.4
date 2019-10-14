import { TestBed } from '@angular/core/testing';

import { ArrosagesService } from './arrosages.service';

describe('ArrosagesService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: ArrosagesService = TestBed.get(ArrosagesService);
    expect(service).toBeTruthy();
  });
});
