import { TestBed } from '@angular/core/testing';

import { EclairagesService } from './eclairages.service';

describe('EclairagesService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: EclairagesService = TestBed.get(EclairagesService);
    expect(service).toBeTruthy();
  });
});
