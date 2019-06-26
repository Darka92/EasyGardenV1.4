import { TestBed } from '@angular/core/testing';

import { BassinService } from './bassin.service';

describe('BassinService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: BassinService = TestBed.get(BassinService);
    expect(service).toBeTruthy();
  });
});
